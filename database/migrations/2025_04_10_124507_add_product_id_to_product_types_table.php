<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('product_types', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->nullable();  // Menambahkan kolom product_id
            $table->foreign('product_id')->references('id')->on('products');  // Menambahkan foreign key
        });
    }
    
    public function down()
    {
        Schema::table('product_types', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');
        });
    }
};
