<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('variants', function (Blueprint $table) {
            // Menambahkan kolom product_id
            $table->unsignedBigInteger('product_id');
    
            // Menambahkan foreign key untuk product_id
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('variants', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');
        });
    }    
};
