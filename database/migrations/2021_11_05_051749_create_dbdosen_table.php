<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbdosenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dbdosen', function (Blueprint $table) {
            $table->id();
            $table->string('nama',50);
            $table->string('nip',15);
            $table->string('gelar_depan',20);
            $table->string('gelar_belakang',20);
            $table->string('no_telepon',15);
            $table->string('mata_kuliah1',50)->nullable();
            $table->string('mata_kuliah2',50)->nullable();
            $table->string('mata_kuliah3',50)->nullable();
            $table->string('mata_kuliah4',50)->nullable();
            $table->string('mata_kuliah5',50)->nullable();
            $table->string('mata_kuliah6',50)->nullable();
            $table->string('mata_kuliah7',50)->nullable();
            $table->string('mata_kuliah8',50)->nullable();
            $table->bigInteger('fakultas')->unsigned();
            $table->bigInteger('jurusan')->unsigned();
            $table->string('semester',6);
            $table->string('foto_dosen',50);
            $table->string('status',20);
            $table->timestamps();
        });

        Schema::table('dbdosen', function (Blueprint $table) {
            $table->foreign('fakultas')->references('id')->on('dbfakultas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jurusan')->references('id')->on('dbjurusan')->onDelete('cascade')->onUpdate('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dbdosen');
    }
}
