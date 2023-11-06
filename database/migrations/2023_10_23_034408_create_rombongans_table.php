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
        Schema::create('rombongan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_rombongan', 100);
            $table->integer('jumlah_rombongan');
            $table->string('no_rekening', 50);
            $table->string('bukti_transfer', 300)->nullable();
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
        Schema::dropIfExists('rombongan');
    }
};
