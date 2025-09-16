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
        Schema::create('cats', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('名前');
            $table->string('breed')->comment('品種');
            $table->integer('gender')->comment('性別 0:オス 1:メス');
            $table->date('date_of_birth')->nullable()->comment('生年月日');
            $table->string('image')->nullable()->comment('画像');
            $table->text('introduction')->nullable()->comment('説明文');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cats');
    }
};
