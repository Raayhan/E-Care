<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->string('patient_name');
            $table->string('patient_age');
            $table->string('patient_gender');
            $table->string('patient_blood');
            $table->integer('doctor_id');
            $table->string('doctor_name');
            $table->string('doctor_designation');
            $table->string('doctor_gender');
            $table->string('department_name');
            $table->string('status');
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
        Schema::dropIfExists('appointments');
    }
}
