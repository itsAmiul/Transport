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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('passenger_user_id')->constrained('passengers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('driver_user_id')->constrained('drivers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('destination_remember_key')->constrained('destinations')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('date');
            $table->string('status')->default('Waiting Confirmation');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
