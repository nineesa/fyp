<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('penganjur');
            $table->string('program');
            $table->string('penerangan_program')->nullable();
            $table->timestamp('masa_mula');
            $table->timestamp('masa_akhir')->nullable();
            $table->string('lokasi');
            $table->string('kump_sasaran');
            $table->string('kos');
            $table->string('max_peserta');
            $table->string('status')->default('Sedang Diproses')->nullable();


            $table->integer('user_id')->unsigned();
            $table->timestamps();

            //foreign key
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftarans');
    }
}
