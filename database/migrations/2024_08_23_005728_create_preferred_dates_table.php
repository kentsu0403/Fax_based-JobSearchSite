<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('preferred_dates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id');
            $table->date('preferred_date_1');
            $table->date('preferred_date_2')->nullable();
            $table->date('preferred_date_3')->nullable();

            // 外部キー制約
            $table->foreign('application_id')->references('application_id')->on('applications')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('preferred_dates');
    }
};
