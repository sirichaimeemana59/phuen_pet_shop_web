<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKnowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('know', function (Blueprint $table) {
            $table->Increments('id');
            $table->text('name_th');
            $table->text('name_en')->nullable();
            $table->text('detail_th');
            $table->text('detail_en')->nullable();
            $table->text('photo')->nullable();
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
        Schema::dropIfExists('know');
    }
}
