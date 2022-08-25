<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->date('report_date');
            $table->integer('hour_price')->default(0);
            $table->integer('total_hours')->default(0);
            $table->integer('total_hours_overtime')->default(0);
            $table->integer('discount_total')->default(0);
            $table->integer('total');
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
        Schema::dropIfExists('reports');
    }
}
