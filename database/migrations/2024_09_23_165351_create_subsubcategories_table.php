<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubsubcategoriesTable extends Migration
{
    public function up(): void
    {
        Schema::create('subsubcategories', function (Blueprint $table) {
            $table->id();
            $table->string('name_en'); // Nom en anglais
            $table->string('name_fr')->nullable(); // Nom en français
            $table->string('name_ar')->nullable(); // Nom en arabe
            $table->text('description_en')->nullable(); // Description en anglais
            $table->text('description_fr')->nullable(); // Description en français
            $table->text('description_ar')->nullable(); // Description en arabe
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Référence à la catégorie
            $table->foreignId('subcategory_id')->constrained()->onDelete('cascade'); // Référence à la sous-catégorie
            $table->string('photo')->nullable(); // Photo de la sous-sous-catégorie
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subsubcategories');
    }
}