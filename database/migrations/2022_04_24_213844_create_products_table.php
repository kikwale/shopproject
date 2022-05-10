<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('owner_id');
            $table->string('shop_id');
            $table->string('category');//rejareja/jumla
            $table->string('unit');
            $table->float('quantity')->nullable();
            $table->string('money_unit')->nullable();
            $table->float('total');
            $table->string('notification')->nullable();
            $table->float('purchased_price');
            $table->float('sold_price');
            $table->date('expire')->default('2023-04-28');//Tutaitoa isiwe null
            $table->string('location')->nullable();
            $table->boolean('isExpired')->default(false);//notified
            $table->string('description')->nullable();
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
        Schema::dropIfExists('products');
    }
}
