<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use App\Models\Employee;
use App\Models\reports;
use App\Models\system;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

        $total_hour_price = system::where('id', $employee_group_id)->pluck('total_hour_price')->first();

        $starttime = Carbon::parse(Employee::where('id', $employee_id)->pluck('starttime')->first());
        $endtime = Carbon::parse(Employee::where('id', $employee_id)->pluck('endtime')->first());

        $diff_hours = $endtime->diffInHours($starttime);

        // check date absence found or no

        $absence_date_exists = attendance::where('absence_date', $employee_date)->where('employee_id', $employee_id)->exists();

        // check the employee absence or No

        if($request->has('Absent')){

            // calc discount day Absent

            $Absent_day_discount = $total_hour_price * $diff_hours;

            // when Absent the employee

            if($absence_date_exists){
                $attendance = attendance::where('employee_id', $employee_id)->where('absence_date', $employee_date);
                $attendance->update([
                    'do_absence'    => 1,
                    'absence_date' => $employee_date,
                    'employee_id'   => $employee_id,
                    'system_id'     => $employee_group_id,
                    'Discount_total'  => $Absent_day_discount,
                ]);
            }
            else {
                attendance::create([
                    'do_absence'    => 1,
                    'absence_date'  => $employee_date,
                    'employee_id'   => $employee_id,
                    'system_id'     => $employee_group_id,
                    'Discount_total'  => $Absent_day_discount,
                ]);
            }
            $total_absence_days = attendance::where('employee_id', $employee_id)->where('do_absence', 1)->count();

            $update_Employee = Employee::where('id', $employee_id);

            $update_Employee->update([
                'total_Absent_days' => $total_absence_days
            ]);

            // write report Abasent day

            $total_hours_amount = attendance::where('employee_id', $employee_id)->where('absence_date', $employee_date)->pluck('total_hours_amount')->last();

            $diff_hours_amount = attendance::where('employee_id', $employee_id)->where('absence_date', $employee_date)->pluck('diff_hours_over')->last();

            $discount_total = attendance::where('employee_id', $employee_id)->where('absence_date', $employee_date)->pluck('Discount_total')->last();

            $report = reports::where('employee_id', $employee_id)->where('report_date', $employee_date)->exists();
            if($report){
                $update_report = reports::where('employee_id', $employee_id)->where('report_date', $employee_date);
                $update_report->update([
                    'report_date'           => $employee_date,
                    'hour_price'            => $total_hour_price,
                    'discount_total'        => $Absent_day_discount,
                    'total'                 => $discount_total,
                    'employee_id'           => $employee_id,
                ]);
            }
            else {
                reports::create([
                    'report_date'           => $employee_date,
                    'hour_price'            => $total_hour_price,
                    'discount_total'        => $Absent_day_discount,
                    'total'                 => $discount_total,
                    'employee_id'           => $employee_id,
                ]);
            }

        }
        else {
            $attendance_exists = attendance::where('date', $employee_date)->where('employee_id', $employee_id)->exists();

            // calc attendance_time && departure_time

            $attendance_time = Carbon::parse($employee_attendance_time);
            $departure_time = Carbon::parse($employee_departure_time);

            $diff_time = $departure_time->diffInHours($attendance_time);

            $total_day = $total_hour_price * $diff_time;

            $diff_work = $diff_time - $diff_hours;

            if($attendance_exists){
                $attendance = attendance::where('employee_id', $employee_id)->where('date', $employee_date);
                $attendance->update([
                    'date'         => $employee_date,
                    'attendance_time'  => $employee_attendance_time,
                    'departure_time' => $employee_departure_time,
                    'do_absence'    => 0,
                    'absence_date' => $employee_date,
                    'employee_id'   => $employee_id,
                    'system_id'     => $employee_group_id,
                ]);

                $attendance_de = attendance::where('employee_id', $employee_id)->where('date', $employee_date);
                $attendance_de->update([
                    'total_hours_amount' => $diff_time,
                    'total_price_amount' => $total_day,
                    'diff_hours_over'     => $diff_work,
                ]);
            }
            else {
                attendance::create([
                    'date'         => $employee_date,
                    'attendance_time'  => $employee_attendance_time,
                    'departure_time' => $employee_departure_time,
                    'total_hours_amount' => $diff_time,
                    'total_price_amount' => $total_day,
                    'diff_hours_over'     => $diff_work,
                    'do_absence'    => 0,
                    'employee_id'   => $employee_id,
                    'system_id'     => $employee_group_id,
                ]);
            }

            // write discount days report

            $total_hours_amount = attendance::where('employee_id', $employee_id)->where('date', $employee_date)->pluck('total_hours_amount')->last();
            $diff_hours_amount = attendance::where('employee_id', $employee_id)->where('date', $employee_date)->pluck('diff_hours_over')->last();
            $discount_total = attendance::where('employee_id', $employee_id)->where('date', $employee_date)->pluck('Discount_total')->last();

            if(isset($Absent_day_discount)){
                $total = ($total_hours_amount * $total_hour_price) + ($diff_hours_amount * $total_hour_price) - $Absent_day_discount;
            }
            else {
                $total = ($total_hours_amount * $total_hour_price) + ($diff_hours_amount * $total_hour_price);
            }

            $check_departure = attendance::where('employee_id', $employee_id)->where('date', $employee_date)->first();

            if($check_departure->departure_time !== null){

                $total_attendance_days = attendance::where('employee_id', $employee_id)->where('do_absence', 0)->count();

                $update_Employee = Employee::where('id', $employee_id);

                $update_Employee->update([
                    'total_Attendance_days' => $total_attendance_days
                ]);

                $report = reports::where('employee_id', $employee_id)->where('report_date', $employee_date)->exists();
                if($report){
                    $update_report = reports::where('employee_id', $employee_id);
                    $update_report->update([
                        'report_date'           => $employee_date,
                        'hour_price'            => $total_hour_price,
                        'total_hours'           => $total_hours_amount,
                        'total_hours_overtime'  => $diff_hours_amount,
                        'discount_total'        => $discount_total,
                        'total'                 => $total,
                        'employee_id'           => $employee_id,
                    ]);
                }
                else {
                    reports::create([
                        'report_date'           => $employee_date,
                        'hour_price'            => $total_hour_price,
                        'total_hours'           => $total_hours_amount,
                        'total_hours_overtime'  => $diff_hours_amount,
                        'discount_total'        => $discount_total,
                        'total'                 => $total,
                        'employee_id'           => $employee_id,
                    ]);
                }
            }
        }


        return back()->with('success', 'Dated Saved successfly');
    }
}
