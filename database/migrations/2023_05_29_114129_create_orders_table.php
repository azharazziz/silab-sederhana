<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->unsignedBigInteger('clinician_id');
            $table->foreign('clinician_id')->references('id')->on('clinicians');
            $table->unsignedBigInteger('analyst_id');
            $table->foreign('analyst_id')->references('id')->on('analysts');
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->date('registration_date');
            $table->date('examination_date');
            $table->string('insurance');
            $table->string('status')->nullable();
            $table->boolean('verify')->nullable();
            $table->dateTime('verify_date')->nullable();
            $table->boolean('release')->default(false);
            $table->boolean('validate')->default(false);
            $table->string('note')->nullable();
            $table->string('paid_status');
            $table->string('critical_value')->nullable();
            $table->string('receiver')->nullable();
            $table->string('delivery_officer')->nullable();
            $table->string('report_receiver')->nullable();
            $table->string('reporter')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
