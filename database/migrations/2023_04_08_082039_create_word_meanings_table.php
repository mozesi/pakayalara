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
        Schema::create('word_meanings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('meaning_en');
            $table->text('local_sentence');
            $table->text('en_sentence');
            $table->timestamps();
        });

        Schema::table('word_meanings', function (Blueprint $table) {
            $table->unsignedBigInteger('word_id');
            $table->foreign('word_id')->references('id')->on('words');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('word_meanings');
    }
};
