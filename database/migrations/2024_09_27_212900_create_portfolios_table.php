<?php 
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema; 
    
    
    class CreatePortfoliosTable extends Migration { public function up() {
    Schema::create('portfolios', function (Blueprint $table) { $table->id();
    $table->string('name');
    $table->string('link');
    $table->unsignedBigInteger('category_id');
    $table->unsignedBigInteger('subcategory_id')->nullable();
    $table->unsignedBigInteger('subsubcategory_id')->nullable();
    $table->string('photo')->nullable(); 
    $table->timestamps();

    // Foreign Key Constraints
    $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
    $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
    $table->foreign('subsubcategory_id')->references('id')->on('subsubcategories')->onDelete('cascade');
    });
    }

    public function down()
    {
    Schema::dropIfExists('portfolios');
    }
    }