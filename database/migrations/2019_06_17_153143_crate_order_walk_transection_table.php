<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateOrderWalkTransectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_walk_transection', function (Blueprint $table) {
            $table->Increments('id');
            $table->text('code_order');
            $table->Integer('product_id');
            $table->Integer('unit_sale');
            $table->Integer('amount');
            $table->Decimal('price_unit',10,2);
            $table->Decimal('total_price',10,2);
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
        Schema::dropIfExists('order_walk_transection');
    }
}
