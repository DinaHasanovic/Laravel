<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCommentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            // Dodajemo kolonu post_id kao strani ključ koji se odnosi na id u tabeli posts
            $table->foreignId('post_id')->constrained()->onDelete('cascade');

            // Dodajemo kolonu user_id kao strani ključ koji se odnosi na id u tabeli users
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Dodajemo kolonu comment za sadržaj komentara
            $table->text('comment');

            // Dodajemo created_at i updated_at kolone za evidenciju vremena kreiranja i ažuriranja komentara
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            // Brišemo dodate kolone ako je potrebno pomoću down metode migracije
            $table->dropForeign(['post_id']);
            $table->dropForeign(['user_id']);
            $table->dropColumn(['post_id', 'user_id', 'comment']);
        });
    }
}
