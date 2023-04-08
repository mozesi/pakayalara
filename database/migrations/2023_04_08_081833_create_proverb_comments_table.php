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
        Schema::create('proverb_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('comment_description');
            $table->bigInteger('likes')->nullable();
            $table->bigInteger('dislikes')->nullable();
            $table->softDeletesTz($column = 'deleted_at', $precision = 0);
            $table->timestamps();
        });

        Schema::table('proverb_comments', function (Blueprint $table) {
            $table->unsignedBigInteger('proverb_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('proverb_id')->references('id')->on('proverbs');
            $table->foreign('user_id')->references('id')->on('users');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proverb_comments');
    }
};
