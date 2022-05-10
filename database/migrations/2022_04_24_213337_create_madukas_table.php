<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMadukasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('madukas', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('shop_name');
            $table->string('country');
            $table->string('region');
            $table->string('district');
            $table->string('ward')->nullable();
            $table->string('street');
            $table->string('tin')->nullable();;
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
        Schema::dropIfExists('madukas');
    }
}
