<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('name_en'); // Nom en anglais
            $table->string('name_fr')->nullable(); // Nom en français
            $table->string('name_ar')->nullable(); // Nom en arabe
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('subcategories');
    }
};