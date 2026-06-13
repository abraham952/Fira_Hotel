<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->json('gallery')->nullable()->after('images');
            $table->string('featured_image')->nullable()->after('images');
            $table->string('virtual_tour_url')->nullable()->after('gallery');
        });
    }

    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn(['gallery', 'featured_image', 'virtual_tour_url']);
        });
    }
};
