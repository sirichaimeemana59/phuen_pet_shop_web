<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWiddenTransectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widden_transection', function (Blueprint $table) {
            $table->increments('id');
            $table->text('code');
            $table->text('product_id');
            $table->integer('unit_widden',10,2);
            $table->decimal('amount_widden',10,2);
            $table->integer('id_product_stock');
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
        Schema::dropIfExists('widden_transection');
    }
}
