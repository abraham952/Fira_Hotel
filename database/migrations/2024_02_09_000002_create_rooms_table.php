<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->constrained()->cascadeOnDelete();
            $table->json('name');
            $table->json('description');
            $table->string('room_type'); // deluxe, suite, presidential
            $table->integer('capacity')->default(2);
            $table->integer('beds')->default(1);
            $table->decimal('size_sqm', 8, 2);
            $table->decimal('base_price', 10, 2);
            $table->json('amenities')->nullable();
            $table->json('images')->nullable();
            $table->string('view_type')->nullable(); // ocean, city, garden
            $table->boolean('is_available')->default(true);
            $table->integer('total_rooms')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
