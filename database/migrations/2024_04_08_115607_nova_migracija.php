<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('comments', function (Blueprint $table) {
        if (!Schema::hasColumn('comments', 'post_id')) {
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
        }

        if (!Schema::hasColumn('comments', 'user_id')) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        }

        if (!Schema::hasColumn('comments', 'comment')) {
            $table->text('comment');
        }

        if (!Schema::hasColumn('comments', 'created_at')) {
            $table->timestamps();
        }
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            // Brišemo dodate kolone ako je potrebno pomoću down metode migracije
            $table->dropForeign(['post_id']);
            $table->dropForeign(['user_id']);
            $table->dropColumn(['post_id', 'user_id', 'comment']);
        });
    }
};
