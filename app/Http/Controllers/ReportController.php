<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\reports_employee;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        $All_reports = reports_employee::with('Employee')->get();
        return view('Pages.reports', compact('All_reports'));
    }
    public function search(Request $request){
        $search_date = $request->search_date;
        $search_target = $request->search_target;
        $reports = reports_employee::with('Employee')->groupBy('employee_id')->get();

        if($search_date !== null){
            $All_reports = reports_employee::whereDate('report_date', $search_date)->get();
        }

        else if ($search_target !== null){
            $All_reports = reports_employee::join('employees', 'employees.id', '=', 'reports_employees.employee_id')->where('fname', 'like', '%'. $search_target . '%')->orWhere('report_num', $search_target)->get();
        }

        return view('Pages.reports', compact('All_reports'));
    }
}
