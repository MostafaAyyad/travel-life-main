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
            $table->id();
            $table->string('car_type');
            $table->date('date_of_receipt');
            $table->time('pick_up_time');
            $table->integer('number_of_days');
            $table->string('receiving_location');
            $table->decimal('total_price', 10, 2);
            $table->string('payment_method');
            $table->string('payment_status')->default('pending'); // pending, completed, failed
            $table->timestamps();
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
