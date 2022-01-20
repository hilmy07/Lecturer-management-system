<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbjurusanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dbjurusan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jurusan',20);
            $table->bigInteger('pilih_fakultas')->unsigned();
            $table->string('nama_jurusan',50);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });

        Schema::table('dbjurusan', function (Blueprint $table) {
            $table->foreign('pilih_fakultas')->references('id')->on('dbfakultas')->onDelete('cascade')->onUpdate('cascade');
        });

    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dbjurusan');
    }
}
