<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('variants', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_id')->nullable();
    
            // Asumsi kamu punya tabel branches dan relasi foreign key
            $table->foreign('branch_id')->references('id')->on('branches');
        });
    }
    
    public function down()
    {
        Schema::table('variants', function (Blueprint $table) {
            $table->dropForeign(['branch_id']);
            $table->dropColumn('branch_id');
        });
    }    
};
