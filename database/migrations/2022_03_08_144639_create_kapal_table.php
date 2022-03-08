<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKapalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kapal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tipe_kapal');
            $table->unsignedBigInteger('id_bahan_kapal');
            $table->string('merk_kapal');
            $table->string('ukuran_kapal');
            $table->string('lebar_kapal');
            $table->string('panjang_kapal');
            $table->string('dalam_kapal');
            $table->string('tahun_pembuatan');
            $table->string('tempat_pembuatan');
            $table->string('loa');
            $table->string('nomor_mesin');
            $table->string('merk_mesin');
            $table->string('tipe_mesin');
            $table->string('daya_mesin');
            $table->string('tempat_pendaftaran');
            $table->string('grosse_akta');
            $table->string('jumlah_palka');
            $table->string('tanda_pengenal_kapal');
            $table->integer('gt');
            $table->integer('nt');
            $table->string('nama_kapal')->nullable();
            $table->string('nama_kapal_sebelum')->nullable();
            $table->timestamps();

            $table->foreign('id_tipe_kapal')
                ->references('id')
                ->on('tipe_kapal');

            $table->foreign('id_bahan_kapal')
                ->references('id')
                ->on('bahan_kapal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kapal');
    }
}
