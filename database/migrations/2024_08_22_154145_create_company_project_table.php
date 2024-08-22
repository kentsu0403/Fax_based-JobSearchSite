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
        Schema::create('company_project', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('project_id');

            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
            $table->foreign('project_id')->references('project_id')->on('projects')->onDelete('cascade');

            $table->primary(['company_id', 'project_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_project');
    }
};
