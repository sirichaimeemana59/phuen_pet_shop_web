<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderCompanyTransectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_company_transection', function (Blueprint $table) {
            $table->Increments('id');
            $table->text('code');
            $table->integer('product_id')->nullable();
            $table->text('name');
            $table->decimal('amount',10,0);
            $table->integer('unit');
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
        Schema::dropIfExists('order_company_transection');
    }
}
