<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Periksa apakah kolom 'status' masih ada sebelum menghapusnya
            if (Schema::hasColumn('products', 'status')) {
                $table->dropColumn('status');
            }

            // Tambah kolom deskripsi jika belum ada
            if (!Schema::hasColumn('products', 'description')) {
                $table->text('description')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Restore jika rollback
            $table->string('status')->default('available');
            $table->dropColumn('description');
        });
    }
};
