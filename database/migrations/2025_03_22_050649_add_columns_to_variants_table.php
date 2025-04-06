<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToVariantsTable extends Migration
{
    public function up()
    {
        Schema::table('variants', function (Blueprint $table) {
            // Menambah kolom tipe produk
            $table->string('type')->nullable();
            // Menambah kolom warna produk
            $table->string('color')->nullable();
            // Menambah kolom gambar produk
            $table->string('image')->nullable();
            // Menambah relasi ke kategori
            $table->unsignedBigInteger('category_id');
            // Menambah relasi ke cabang
            $table->unsignedBigInteger('branch_id');
            
            // Menambahkan foreign key untuk kategori
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            // Menambahkan foreign key untuk cabang
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('variants', function (Blueprint $table) {
            // Menghapus kolom yang telah ditambahkan jika migrasi dirollback
            $table->dropColumn('type');
            $table->dropColumn('color');
            $table->dropColumn('image');
            $table->dropForeign(['category_id']);
            $table->dropForeign(['branch_id']);
            $table->dropColumn('category_id');
            $table->dropColumn('branch_id');
        });
    }
}