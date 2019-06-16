<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSickTransectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sick_transection', function (Blueprint $table) {
            $table->Increments('id');
            $table->text('sick_id');
            $table->text('sick_th');
            $table->text('sick_en')->nulllable();
            $table->text('detail_th');
            $table->text('detail_en')->nullable();
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
        Schema::dropIfExists('sick_transection');
    }
}
