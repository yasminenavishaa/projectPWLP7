<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa_matakuliah', function(Blueprint $table){
            $table->id();
            $table->integer('mahasiswa_id')->nullable();//menambahkan kolom mahasiswa_id
            $table->unsignedBigInteger('matakuliah_id')->nullable();//menambahkan kolom matakuliah_id
            $table->integer('nilai');
            $table->foreign('mahasiswa_id')->references('nim')->on('mahasiswas'); //menambahkan foreign key di kolom mahasiswa_id
            $table->foreign('matakuliah_id')->references('id')->on('matakuliah'); //menambahkan foreign key di kolom matakuliah_id
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
        Schema::dropIfExists('mahasiswa_matakuliah');
    }
};
