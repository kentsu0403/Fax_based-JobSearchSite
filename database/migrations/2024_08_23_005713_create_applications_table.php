<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id('application_id');
            $table->unsignedBigInteger('project_id');
            $table->string('applicant_name', 100);
            $table->string('applicant_email', 255);
            $table->string('applicant_phone', 15)->nullable();
            $table->date('applicant_birthdate')->nullable();
            $table->text('notes')->nullable();
            $table->timestamp('application_date')->useCurrent();
            $table->timestamps();  // この行を追加

            // 外部キー制約
            $table->foreign('project_id')->references('project_id')->on('projects')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
