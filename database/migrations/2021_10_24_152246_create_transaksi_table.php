<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_paket')->unsigned();
            $table->integer('id_pelanggan')->unsigned();
            $table->enum('status_pesanan',['diproses','selesai','diantar'])->default('diproses');
            $table->enum('status_pembayaran',['belum_dibayar','lunas'])->default('belum_dibayar');
            $table->date('tanggal_masuk');
            $table->timestamps();

            $table->foreign('id_paket')->references('id')->on('paket')->onDelete('cascade');
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
