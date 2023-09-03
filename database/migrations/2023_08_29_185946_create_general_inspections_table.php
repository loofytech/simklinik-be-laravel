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
        Schema::create('general_inspections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registration_id');
            $table->text('anamnesis')->nullable();
            $table->text('objective')->nullable();
            $table->text('ku')->nullable();
            $table->text('thoraks')->nullable();
            $table->text('therapy')->nullable();
            $table->text('education')->nullable();
            $table->text('instruction')->nullable();
            $table->text('abd')->nullable();
            $table->text('extremity')->nullable();
            $table->text('working_diagnostics')->nullable();
            $table->string('diagnosis_code')->nullable();
            $table->string('diagnosis_name')->nullable();
            $table->text('physical_examination')->nullable();
            $table->text('etc')->nullable();
            $table->text('follow_up')->nullable();
            $table->string('attachment_before_checking')->nullable();
            $table->string('attachment_after_checking')->nullable();
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
        Schema::dropIfExists('general_inspections');
    }
};
