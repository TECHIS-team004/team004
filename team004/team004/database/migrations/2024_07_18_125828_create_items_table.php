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
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('type', 100)->nullable()->default(null);
            $table->string('detail', 500)->nullable()->default(null);
            $table->bigInteger('created_user_id')->unsigned();
            $table->bigInteger('updated_user_id')->unsigned();
            $table->timestamps();
    
            $table->index('name');
            $table->index('created_user_id');
            $table->index('updated_user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
