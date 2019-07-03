<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation', function (Blueprint $table) {
            $table->Increments('id');
            $table->text('order_code');
            $table->integer('user_id')->nullable();
            $table->decimal('total',10,2)->nullable();
            $table->decimal('discount',10,2)->nullable();
            $table->decimal('vat',10,2)->nullable();
            $table->decimal('grand_total',10,2)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('quotation');
    }
}
