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
        Schema::create('projects_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_Project')->nullable();
            $table->string('path_image')->nullable();
            $table->timestamps();

            $table->foreign('id_project')->references('id')->on('project_Data')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_projects_images');
    }
};
