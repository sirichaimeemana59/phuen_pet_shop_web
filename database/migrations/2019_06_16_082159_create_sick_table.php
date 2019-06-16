<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSickTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sick', function (Blueprint $table) {
            $table->Increments('id');
            $table->text('name_th');
            $table->text('name_en')->nullable();
            //$table->text('disease_name_th');
            //$table->text('disease_name_en')->nullable();
            $table->text('detail_th');
            $table->text('detail_en')->nullable();
            $table->text('code');
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
        Schema::dropIfExists('sick');
    }
}
