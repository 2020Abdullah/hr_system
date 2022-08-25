<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("fname");
            $table->string("address")->nullable();
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->date("date_birdth");
            $table->string("Type")->nullable();
            $table->string("Date_of_contract")->nullable();
            $table->time("starttime");
            $table->time("endtime");
            $table->string("salary");
            $table->string("National_ID")->nullable();
            $table->string("Nationality")->nullable();
            $table->string("personal_img")->nullable();
            $table->string("comment")->nullable();
            $table->integer('total_Attendance_days')->default(0);
            $table->integer('total_Absent_days')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
