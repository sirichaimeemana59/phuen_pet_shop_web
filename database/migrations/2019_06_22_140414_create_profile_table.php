<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{

    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('user_id');
            $table->text('name_th');
            $table->text('name_en');
            $table->date('birthday');
            $table->text('tell');
            $table->text('address');
            $table->text('photo');
            $table->text('email');
            $table->integer('povince_id');
            $table->integer('distric_id');
            $table->integer('sub_id');
            $table->text('post_code');
            $table->text('code');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('profile');
    }
}
