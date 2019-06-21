<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderCustomerTransectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_customer_transection', function (Blueprint $table) {
            $table->Increments('id');
            $table->text('order_code');
            $table->integer('product_id');
            $table->decimal('price_product',10,2);
            $table->integer('unit_sale');
            $table->integer('amount');
            $table->decimal('total_price');
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
        Schema::dropIfExists('order_customer_transection');
    }
}
