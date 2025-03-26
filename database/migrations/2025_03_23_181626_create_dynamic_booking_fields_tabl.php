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
        Schema::create('dynamic_booking_fields_tabl', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained('dynamic_booking_sections')->onDelete('cascade');
            $table->string('label');
            $table->string('type');
            $table->string('placeholder')->nullable();
            $table->string('default_value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dynamic_booking_fields_tabl');
    }
};
