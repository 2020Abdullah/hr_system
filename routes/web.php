<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SystemController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// Employees Routes

Route::get("/add_employee", [EmployeeController::class, 'add'])->name('add_employee');
Route::post("/store_employee", [EmployeeController::class, 'store'])->name('store_employee');

// Attendances Routes

Route::get('/Attendances', [AttendanceController::class, 'index'])->name('Attendance');
Route::post('/Attendances/store', [AttendanceController::class, 'store'])->name('Attendance.store');

// General System Routes

Route::get('/system', [SystemController::class, 'index'])->name('system');
Route::post('/system/store', [SystemController::class, 'store'])->name('system.store');
