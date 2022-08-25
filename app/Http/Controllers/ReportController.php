<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use App\Models\Employee;
use App\Models\reports;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        $All_reports = reports::join('employees', 'employees.id', '=', 'reports.employee_id')->groupBy('total_Absent_days')->get(['reports.*', 'employees.*']);
        return view('Pages.reports', compact('All_reports'));
    }
}
