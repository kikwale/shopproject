<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('shop_id');
            $table->string('seller_id');
            $table->string('phone');
            $table->string('email');
            $table->unique(['shop_id', 'seller_id']);
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
        Schema::dropIfExists('shop_contacts');
    }
}
