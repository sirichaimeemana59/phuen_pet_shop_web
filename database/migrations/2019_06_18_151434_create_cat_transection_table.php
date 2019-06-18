<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatTransectionTable extends Migration
{

    public function up()
    {
        Schema::create('cat_transection', function (Blueprint $table) {
            $table->Increments('id');
            $table->text('cat_id');
            $table->text('name_th');
            $table->text('name_en');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cat_transection');
    }
}
