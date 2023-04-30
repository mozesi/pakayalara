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
        Schema::create('reactions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url');
            $table->timestamps();
        });
        /**
        * adding foreign key in the proverb_reactions table
        *
        *Schema::table('proverb_reactions', function (Blueprint $table) {
        *   $table->unsignedBigInteger('reaction_id');
        *  $table->foreign('reaction_id')->references('id')->on('reactions');
        *});
        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reactions');
    }
};
