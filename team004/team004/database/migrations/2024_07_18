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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('email', 255)->unique();
            $table->timestamp('email_verified_at')->nullable()->default(null);
            $table->string('password', 255);
            $table->string('remember_token', 100)->nullable()->default(null);
            $table->integer('is_admin')->default(0)->comment('1: 管理者 それ以外:一般ユーザ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
