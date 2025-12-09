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
        Schema::create('landing_information', function (Blueprint $table) {
            $table->id();
            $table->string('HeaderDesk');
            $table->json('HeaderSkill');
            $table->string('CV');
            $table->string('AboutDesk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_information');
    }
};
