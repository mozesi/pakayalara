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
        Schema::create('proverb_meanings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('meaning_en');
            $table->text('local_sentence');
            $table->text('en_sentence');
            $table->timestamps();
        });

        Schema::table('proverb_meanings', function (Blueprint $table) {
            $table->unsignedBigInteger('proverb_id');
            $table->foreign('proverb_id')->references('id')->on('proverbs');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proverb_meanings');
    }
};
