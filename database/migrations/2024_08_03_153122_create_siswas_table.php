<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id(); // id siswa
            $table->string('nama_lengkap');
            $table->text('alamat');
            $table->date('tanggal_lahir');
            $table->string('no_tlpn');
            $table->unsignedBigInteger('kelas_id');
            $table->timestamps();

            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
        });       
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
