<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('plat_nomor');
            $table->text('nama_motor');
            $table->text('merk');
            $table->string('warna');
            $table->string('tahun_kendaraan');
            $table->text('no_mesin');
            $table->text('no_rangka');
            $table->integer('modal');
            $table->integer('harga_beli');
            $table->integer('biaya_perbaikan');
            $table->text('cover');
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
        Schema::dropIfExists('motors');
    }
}