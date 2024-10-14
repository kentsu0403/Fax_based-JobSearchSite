<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_id')->constrained('news'); // ニュース記事のIDに外部キーを設定
            $table->string('user_location');
            $table->integer('user_age');
            $table->boolean('vote'); // 1が肯定、0が否定
            $table->enum('gender', ['male', 'female']); // 性別カラムを追加
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
