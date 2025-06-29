<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rams', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('capacity', 20)->unique()->comment('Kapasitas RAM, contoh: 8GB, 16GB');
            $table->enum('type', ['DDR3', 'DDR4', 'DDR5'])->default('DDR4')->comment('Jenis RAM');
            $table->string('image', 255)->nullable()->comment('Path atau nama file gambar RAM');
            $table->unsignedSmallInteger('speed')->comment('Kecepatan RAM dalam MHz');
            $table->text('description')->comment('Deskripsi RAM');
            $table->timestamps();

            // Optional: index untuk kolom type
            $table->index('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rams');
    }
}
