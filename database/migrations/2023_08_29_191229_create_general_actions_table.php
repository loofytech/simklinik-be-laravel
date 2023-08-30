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
        Schema::create('general_actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registration_id');
            $table->unsignedBigInteger('clinic_rate_id');
            $table->integer('quantity')->default(1);
            $table->unsignedBigInteger('nakes_first');
            $table->unsignedBigInteger('nakes_second');
            $table->double('sub_total');
            $table->timestamps();

            $table->foreign('registration_id')->references('id')->on('registrations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('clinic_rate_id')->references('id')->on('clinic_rates')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nakes_first')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nakes_second')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_actions');
    }
};
