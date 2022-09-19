<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class reports_employee extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Employee(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
