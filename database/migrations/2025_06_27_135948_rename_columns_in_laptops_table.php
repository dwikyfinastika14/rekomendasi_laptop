<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('laptops', function (Blueprint $table) {
            $table->renameColumn('processor_id', 'prosesors_id');
            $table->renameColumn('ram_id', 'rams_id');
        });
    }

    public function down()
    {
        Schema::table('laptops', function (Blueprint $table) {
            $table->renameColumn('prosesors_id', 'processor_id');
            $table->renameColumn('rams_id', 'ram_id');
        });
    }
};
