<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id(); // auto_increment primary key
            $table->unsignedBigInteger('id_kategori');
            $table->unsignedBigInteger('id_pembelian');
            $table->string('nama');
            $table->string('harga_beli');
            $table->string('harga_jual');
            $table->string('stok');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}
