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
        Schema::create('screenings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registration_id');
            $table->double('body_weight');
            $table->double('body_height');
            $table->double('body_temperature');
            $table->double('body_breath');
            $table->double('body_pulse');
            $table->double('body_blood_pressure_mm');
            $table->double('body_blood_pressure_hg');
            $table->double('body_imt');
            $table->double('body_oxygen_saturation');
            $table->enum('body_diabetes', ["0", "1", "2"])->default(NULL);
            $table->enum('body_haemopilia', ["0", "1", "2"])->default(NULL);
            $table->enum('body_heart_desease', ["0", "1", "2"])->default(NULL);
            $table->double('abdominal_circumference');
            $table->text('history_other_desease')->nullable();
            $table->text('history_treatment')->nullable();
            $table->text('allergy_medicine')->nullable();
            $table->text('allergy_food')->nullable();
            $table->boolean('is_ready_action')->default(0);
            $table->timestamps();

            $table->foreign('registration_id')->references('id')->on('registrations')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('screenings');
    }
};
