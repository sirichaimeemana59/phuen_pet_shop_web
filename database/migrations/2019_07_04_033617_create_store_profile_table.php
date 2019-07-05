<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_profile', function (Blueprint $table) {
            $table->Increments('id');
            $table->text('name_th');
            $table->text('name_en')->nullable();
            $table->text('tell')->nullable();
            $table->text('email')->nullable();
            $table->text('fax')->nullable();
            $table->text('photo_top')->nullable();
            $table->text('photo_center')->nullable();
            $table->text('photo_foot')->nullable();
            $table->text('address')->nullable();
            $table->text('photo_logo')->nullable();
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
        Schema::dropIfExists('store_profile');
    }
}
