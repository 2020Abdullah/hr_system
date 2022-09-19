<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use App\Models\Employee;
use App\Models\reports_employee;
use App\Models\system;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class AttendanceController extends Controller
{
    public function index(){
        $groups = system::all();
        $employes = Employee::select('id', 'fname')->get();
        $attendance = attendance::where('do_absence', '=' ,0)->join('employees', 'employees.id', '=', 'attendances.employee_id')->select('attendances.*', 'employees.fname')->get();

        $abasent = attendance::where('do_absence', '=' , 1)->join('employees', 'employees.id', '=', 'attendances.employee_id')->select('attendances.*', 'employees.fname')->get();

        return view('Pages.attendance', compact('employes', 'attendance', 'abasent', 'groups'));
    }

    public function store(Request $request){

        // Required Validation

        $request->validate([
            'fcode'      => 'required',
            'group_id'  => 'required',
            'date'    => 'required',
        ]);

        // get All variables

        $employee_id = $request->fcode;
        $employee_date = $request->date;
        $employee_group_id = $request->group_id;
        $employee_attendance_time = $request->starttime;
        $employee_departure_time = $request->endtime;

        // get system discount && hours price && calc diff hours_employee

        $sys_hour_price = system::where('id', $employee_group_id)->pluck('total_hour_price')->first();

        $starttime = Carbon::parse(Employee::where('id', $employee_id)->pluck('starttime')->first());
        $endtime = Carbon::parse(Employee::where('id', $employee_id)->pluck('endtime')->first());

        $diff_hours = $endtime->diffInHours($starttime);

        // check date absence found or no

        $absence_date_exists = attendance::where('absence_date', $employee_date)->where('employee_id', $employee_id)->exists();

        // check the employee absence or No

        // calc discount day Absent

        $Absent_day_discount = $sys_hour_price * $diff_hours;

        // write days report

        $lastID = reports_employee::pluck('id')->last();
        // Make a new report id with appending last increment + 1

        $newID = '0' . date('Ymd') . str_pad($lastID + 1 , 3, STR_PAD_LEFT);

        if($request->has('Absent')){

            // when Absent the employee

            if($absence_date_exists){
                $attendance = attendance::where('employee_id', $employee_id)->where('absence_date', $employee_date);
                $attendance->update([
                    'do_absence'    => 1,
                    'absence_date' => $employee_date,
                    'employee_id'   => $employee_id,
                    'system_id'     => $employee_group_id,
                ]);
            }
            else {
                attendance::create([
                    'do_absence'    => 1,
                    'absence_date'  => $employee_date,
                    'employee_id'   => $employee_id,
                    'system_id'     => $employee_group_id,
                ]);
            }

            $count_total_day_Absent = attendance::where('employee_id', $employee_id)->where('do_absence', 1)->count();

            $Emp_total_discount_day = Employee::where('id', $employee_id);
            $Emp_total_discount_day->update([
                'total_Absent_days' => $count_total_day_Absent,
            ]);

            // write report discount
            $report = reports_employee::where('employee_id', $employee_id)->where('report_date', $employee_date)->exists();

            if($report) {

                $report = reports_employee::where('employee_id', $employee_id)->where('report_date', $employee_date);

                $report->update([
                    'hour_price'    => 0,
                    'total_disconut' => $Absent_day_discount,
                    'employee_id'   => $employee_id,
                ]);

            }
            else {
                reports_employee::create([
                    'report_date'   => $employee_date,
                    'report_num'    => $newID,
                    'total_disconut' => $Absent_day_discount,
                    'employee_id'   => $employee_id,
                ]);
            }
            Session::flash('success' , 'تم إضافة البيانات بنجاح');
        }
        else {

            $attendance_exists = attendance::where('date', $employee_date)->where('employee_id', $employee_id)->exists();

            // calc attendance_time && departure_time

            $attendance_time = Carbon::parse($employee_attendance_time); // 9
            $departure_time = Carbon::parse($employee_departure_time); // 3

            $diff_time = $departure_time->diffInHours($attendance_time); // 6

            $check_date = attendance::where('absence_date', $employee_date)->exists();

            if(!$check_date){
                if($attendance_exists){
                    $attendance = attendance::where('employee_id', $employee_id)->where('date', $employee_date);
                    $attendance->update([
                        'date'              => $employee_date,
                        'attendance_time'   => $employee_attendance_time,
                        'departure_time'    => $employee_departure_time,
                        'do_absence'        => 0,
                        'employee_id'       => $employee_id,
                        'system_id'         => $employee_group_id,
                    ]);
                }
                else {
                    attendance::create([
                        'date'         => $employee_date,
                        'attendance_time'  => $employee_attendance_time,
                        'departure_time' => $employee_departure_time,
                        'do_absence'    => 0,
                        'employee_id'   => $employee_id,
                        'system_id'     => $employee_group_id,
                    ]);
                }
                // write report employee

                $check_departure = attendance::where('employee_id', $employee_id)->where('date', $employee_date)->pluck('departure_time')->first();

                if($check_departure !== null){

                    $count_total_day_attand = attendance::where('employee_id', $employee_id)->where('do_absence', 0)->count();

                    $Emp_total_discount_day = Employee::where('id', $employee_id);
                    $Emp_total_discount_day->update([
                        'total_Attendance_days' => $count_total_day_attand,
                    ]);

                    $report_check = reports_employee::where('employee_id', $employee_id)->where('report_date', $employee_date)->exists();

                    if($report_check){
                        $report = reports_employee::where('employee_id', $employee_id)->where('report_date', $employee_date);
                        $report->update([
                            'hour_price'  => $sys_hour_price,
                            'total_hours' => $diff_hours,
                            'total_hours_overtime' => $diff_time,
                            'employee_id'     => $employee_id,
                        ]);
                        Session::flash('success' , 'تم إضافة البيانات بنجاح');
                    }
                    else {
                        reports_employee::create([
                            'report_date' => $employee_date,
                            'report_num'  => $newID,
                            'hour_price'  => $sys_hour_price,
                            'total_hours' => $diff_hours,
                            'total_hours_overtime' => $diff_time,
                            'employee_id'     => $employee_id,
                        ]);
                        Session::flash('success' , 'تم إضافة البيانات بنجاح');
                    }

                }
            }
            else {
                Session::flash('error' , 'حصل خطأ فادح');
            }
        }
        return back();
    }
}
