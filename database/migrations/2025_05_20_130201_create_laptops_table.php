<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaptopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laptops', function (Blueprint $table) {
            $table->id();
            $table->string('brand', 100);
            $table->string('model', 150);
            $table->unsignedBigInteger('prosesors_id');
            $table->unsignedBigInteger('rams_id');
            $table->string('storage', 100);
            $table->decimal('harga', 15, 2);
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('prosesors_id')->references('id')->on('prosesors')->onDelete('cascade');
            $table->foreign('rams_id')->references('id')->on('rams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laptops');
    }
}
