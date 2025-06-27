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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_code')->nullable();
            $table->foreignId('customer_id')->constrained('users')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('car_id')->constrained('cars')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('driver_id')->nullable('drivers')->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->boolean('with_driver')->default(false);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('duration');
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('pending');
            $table->decimal('total_price', 10, 2)->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('confirmed_by')->nullable()->constrained('users')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('cancelled_by')->nullable()->constrained('users')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('completed_by')->nullable()->constrained('users')->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
