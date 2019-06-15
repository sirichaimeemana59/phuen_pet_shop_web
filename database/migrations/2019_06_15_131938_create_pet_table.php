<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('user_id');
            $table->text('name_th');
            $table->text('name_en');
            $table->text('photo');
            $table->date('birthday');
            $table->integer('age');
            $table->decimal('weight',10,2);
            $table->decimal('height',10,2);
            $table->text('detail');
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
        Schema::dropIfExists('pet');
    }
}
