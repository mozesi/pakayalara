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
        Schema::create('comment_reactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->softDeletesTz($column = 'deleted_at', $precision = 0);
            $table->timestamps();
        });

        Schema::table('comment_reactions', function (Blueprint $table) {
            $table->unsignedBigInteger('proverb_comment_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('proverb_comment_id')->references('id')->on('proverb_comments');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_reactions');
    }
};
