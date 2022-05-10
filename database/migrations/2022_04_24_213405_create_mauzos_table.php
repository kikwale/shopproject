<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMauzosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mauzos', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
            $table->string('seller_id');
            $table->string('owner_id');
            $table->string('shop_id');
            $table->string('day');//rejareja/jumla
            $table->string('month');
            $table->string('year');
            $table->date('sales_date');
            $table->float('quantity')->nullable();
            $table->float('amount');
            $table->float('sold_price');
            $table->float('true_price');
            $table->float('discount')->nullable();
            $table->float('profit');
            $table->string('customer_name')->nullable();
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
        Schema::dropIfExists('mauzos');
    }
}
