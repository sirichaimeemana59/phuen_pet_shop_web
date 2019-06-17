<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateOrderWalkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_walk', function (Blueprint $table) {
            $table->Increments('id');
            $table->text('code_order');
            $table->Integer('user_id')->nulllable();
            $table->Decimal('total',10,2)->nulllable();
            $table->Decimal('discount',10,2)->nulllable();
            $table->Decimal('vat',10,2)->nulllable();
            $table->Decimal('grand_total',10,2)->nulllable();
            $table->Decimal('money',10,2)->nulllable();
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
        Schema::dropIfExists('order_walk');
    }
}
