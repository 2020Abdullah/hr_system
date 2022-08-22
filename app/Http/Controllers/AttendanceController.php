<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use App\Models\Employee;
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

        // get All variables

        $employee_id = $request->fcode;
        $employee_date = $request->date;
        $employee_group_id = $request->group_id;
        $employee_attendance_time = $request->starttime;
        $employee_departure_time = $request->endtime;

        // get system discount && hours price && calc diff hours_employee

        $total_hour_price = system::where('id', $employee_group_id)->pluck('total_hour_price')->first();
        $total_discount_hour = system::where('id', $employee_group_id)->pluck('total_discount_hour')->first();

        $starttime = Carbon::parse(Employee::where('id', $employee_id)->pluck('starttime')->first());
        $endtime = Carbon::parse(Employee::where('id', $employee_id)->pluck('endtime')->first());

        $diff_hours = $endtime->diffInHours($starttime);

        // check date found or no

        $attendance_exists = attendance::where('date', $employee_date)->where('employee_id', $employee_id)->exists();

        // check the employee absence or No

        if($request->has('Absent')){

            // calc discount day Absent

            $Absent_day_discount = $total_discount_hour * $diff_hours;

            // when Absent the employee

            if($attendance_exists){
                $attendance = attendance::where('employee_id', $employee_id);
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

            // // write discount days

            // $do_absence = attendance::where('employee_id', $employee_id)->pluck('do_absence')->first();

            // if($do_absence == 1){
            //     $start_work = Carbon::parse(Employee::where('id', $employee_id)->pluck('starttime') ->first());
            //     $end_work = Carbon::parse(Employee::where('id', $employee_id)->pluck('endtime')->first());
            //     $hour_price = system::where('id', $employee_group_id)->pluck('total_hour_price')->first();

            //     $diff_time = $end_work->diffInHours($start_work);
            //     $total_amount = reports::where('employee_id', $employee_id)->pluck('total_amount')->first();
            //     $discount_day = $diff_time * $hour_price;

            //     $total_all = $discount_day - $total_amount;

            //     $report_exists = reports::where('employee_id', $employee_id)->exists();

            //     if($report_exists){
            //         reports::where('employee_id', $employee_id)->increment('Discount_total', $discount_day);
            //         reports::where('employee_id', $employee_id)->increment('Discount_hours', $diff_time);
            //         reports::where('employee_id', $employee_id)->increment('total', $total_all);
            //     }
            //     else {
            //         reports::create([
            //             'employee_id' => $employee_id,
            //             'system_id'   => $employee_group_id,
            //             'Discount_hours' => $diff_time,
            //             'Discount_total' => $discount_day,
            //             'total' => $total_all
            //         ]);
            //     }
            // }

        }
        else {

            // calc attendance_time && departure_time

            $attendance_time = Carbon::parse($employee_attendance_time);
            $departure_time = Carbon::parse($employee_departure_time);

            $diff_time = $departure_time->diffInHours($attendance_time);

            $total_day = $total_hour_price * $diff_time;

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

                // check do departure

                $departure_exists = attendance::where('date', $employee_date)->where('employee_id', $employee_id)->first();

                if($departure_exists->departure_time !== null){
                    $attendance_de = attendance::where('employee_id', $employee_id)->where('date', $employee_date);
                    $attendance_de->update([
                        'total_hours_amount' => $diff_time,
                        'total_price_amount' => $total_day,
                    ]);
                }
            }
            else {
                attendance::create([
                    'date'         => $employee_date,
                    'attendance_time'  => $employee_attendance_time,
                    'departure_time' => $employee_departure_time,
                    'do_absence'    => 0,
                    'absence_date' => $employee_date,
                    'employee_id'   => $employee_id,
                    'system_id'     => $employee_group_id,
                ]);
            }

            // start program attendance

            // if($attendance_exists) {
            //     // Update attendance
            //     $attendance = attendance::where('employee_id', $employee_id);
            //     $attendance->update([
            //         'do_absence'    => 0,
            //         'date'          => $employee_date,
            //         'attendance_time' => $employee_attendance_time,
            //         'departure_time' => $employee_departure_time,
            //         'employee_id'   => $employee_id,
            //     ]);
            // }
            // else {
            //     // create New attendance
            //     attendance::create([
            //         'do_absence'    => 0,
            //         'date'          => $employee_date,
            //         'attendance_time' => $employee_attendance_time,
            //         'departure_time' => $employee_departure_time,
            //         'employee_id'   => $employee_id,
            //     ]);
            // }
        }
        return back()->with('success', 'Dated Saved successfly');
    }
}
