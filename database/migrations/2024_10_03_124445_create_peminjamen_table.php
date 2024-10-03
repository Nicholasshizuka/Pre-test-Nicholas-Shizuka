<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('peminjaman', function (Blueprint $table) {
        $table->id('id_peminjaman'); 
        $table->foreignId('id_pengguna')
              ->constrained('pengguna', 'id_pengguna')
              ->onDelete('cascade');
        $table->string('jumlah_pinjaman',);
        $table->date('batas_waktu_pinjaman');
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
        Schema::dropIfExists('peminjamen');
    }
}
