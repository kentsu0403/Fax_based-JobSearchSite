<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // すでに存在する `name` カラムを追加しないようにする
            // $table->string('name')->nullable();  // これをコメントアウトまたは削除
    
            // 他のカラムの追加（もし必要であれば）
            $table->string('phone')->nullable();
            $table->date('date_of_birth')->nullable();
        });
    }
      
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('phone');
            $table->dropColumn('date_of_birth');
        });
    }
    
};
