<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_product', function (Blueprint $table) {
            $table->integer('id');
            $table->text('order_id');
            $table->decimal('discount',10,2);
            $table->decimal('net',10,2);
            $table->decimal('total',10,2);
            $table->decimal('money',10,2);
            $table->integer('user_id');
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
        Schema::dropIfExists('sell_product');
    }
}
