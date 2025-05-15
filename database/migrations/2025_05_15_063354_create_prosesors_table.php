<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel `prosesors`.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prosesors', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('brand')->comment('Merek prosesor, contoh: Intel, AMD');
            $table->unsignedSmallInteger('jumlah_core')->comment('Jumlah core prosesor');
            $table->string('image')->nullable()->comment('Path atau nama file gambar prosesor');
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Batalkan migrasi dan hapus tabel `prosesors`.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prosesors');
    }
};
