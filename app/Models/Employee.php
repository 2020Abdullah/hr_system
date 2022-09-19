<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\reports_employee;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'starttime' => 'date:hh:mm',
        'endtime'   => 'date:hh:mm',
    ];
    public function reports(){
        $this->hasMany(reports_employee::class);
    }
}
