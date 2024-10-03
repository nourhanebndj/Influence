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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title_en'); 
            $table->string('title_fr')->nullable(); 
            $table->string('title_ar')->nullable(); 
            $table->text('description_en'); 
            $table->text('description_fr')->nullable(); 
            $table->text('description_ar')->nullable(); 
            $table->string('front_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};