<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports_employees', function (Blueprint $table) {
            $table->id();
            $table->date('report_date');
            $table->string('report_num');
            $table->integer('hour_price')->default(0);
            $table->integer('total_hours')->default(0);
            $table->integer('total_hours_overtime')->default(0);
            $table->integer('total_disconut')->default(0);
            $table->foreignId('employee_id')->references('id')->on('employees')->cascadeOnDelete()->cascadeOnUpdate();
            $table->softDeletes();
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
        Schema::dropIfExists('reports_employees');
    }
}
