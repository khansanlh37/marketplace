<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantsTable extends Migration
{

    public function up()
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('color');
            $table->string('image');
            $table->decimal('price', 10, 2); // Kolom price
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('variants');
    }
}
