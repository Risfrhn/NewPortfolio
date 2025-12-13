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
        Schema::create('project_Data', function (Blueprint $table) {
            $table->id();
            $table->string('logo_project')->nullable();
            $table->string('flyer_image')->nullable();
            $table->string('project_name')->nullable();
            $table->string('Company')->nullable();
            $table->date('start_project')->nullable();
            $table->date('end_project')->nullable();
            $table->enum('position', ['Fullstack', 'Backend', 'Frontend', 'System analyst'])->nullable();
            $table->string('description_project')->nullable();
            $table->enum('type', ['portfolio', 'product'])->nullable();
            $table->enum('type_project', ['Website', 'App mobile', 'UI/UX Design', 'App dekstop', 'Documentation'])->nullable();
            $table->json('Tech')->nullable();
            $table->string('feature')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->string('link_website')->nullable();
            $table->string('link_app')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_projects');
    }
};
