<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('medical_record')->unique();
            $table->string('patient_name');
            $table->string('patient_phone');
            $table->string('patient_nik');
            $table->enum('patient_gender', ['L', 'P']);
            $table->string('birth_place');
            $table->date('birth_date');
            $table->text('address');
            $table->string('province');
            $table->string('regency');
            $table->string('district');
            $table->string('subdistrict');
            $table->string('blood_type')->nullable();
            $table->string('religion')->nullable();
            $table->string('ethnic')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('job')->nullable();
            $table->string('education')->nullable();
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
        Schema::dropIfExists('patients');
    }
};
