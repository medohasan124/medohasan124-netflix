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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('eid');
            $table->string('adult');
            $table->string('backdrop_path');
            $table->string('language');
            $table->string('title');
            $table->string('description');
            $table->string('poster');
            $table->date('release_date');
            $table->string('vote');
            $table->string('vote_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
