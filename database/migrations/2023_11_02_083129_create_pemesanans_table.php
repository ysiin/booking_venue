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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venue_id')->constrained('venue');
            $table->foreignId('rombongan_id')->constrained('rombongan');
            $table->date('tanggal_sewa');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->enum('status', ['approved', 'pending'])->default('pending');
            $table->timestamps();
            $table->unique(['venue_id', 'tanggal_sewa', 'jam_mulai', 'jam_selesai']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
};
