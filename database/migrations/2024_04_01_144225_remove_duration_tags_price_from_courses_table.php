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
        Schema::table('courses', function (Blueprint $table) {
            // Izbrisati kolonu "duration"
            $table->dropColumn('duration');
            // Izbrisati kolonu "tags"
            $table->dropColumn('tags');
            // Izbrisati kolonu "price"
            $table->dropColumn('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            // Dodati kolonu "duration"
            $table->string('duration');
            // Dodati kolonu "tags"
            $table->string('tags');
            // Dodati kolonu "price"
            $table->decimal('price', 8, 2);
        });
    }
};
