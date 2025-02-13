<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kode_barang')->unique();
            $table->unsignedBigInteger('id_kategori');
            $table->string('pemasok');
            $table->integer('jumlah');
            $table->decimal('harga_beli', 15, 2);
            $table->date('tanggal_masuk');
            $table->string('faktur')->nullable(); // Untuk upload faktur/nota
            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending'); // Validasi admin
            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('cascade');

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
        Schema::dropIfExists('barang_masuks');
    }
}
