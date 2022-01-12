<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chatfiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chat_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('rental_address')->nullable();
            $table->integer('property_id')->unsigned()->nullable();
            $table->string('title')->nullable();
            $table->string('path')->nullable();
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
        Schema::dropIfExists('chatfiles');
    }
}
