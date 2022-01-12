<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('add_id')->unsigned()->nullable();
            $table->integer('property_id')->unsigned()->nullable();
            $table->integer('renter_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->text('message')->nullable();
            $table->string('score')->nullable();
            $table->string('occupent')->nullable();
            $table->string('pet')->nullable();
            $table->string('smoke')->nullable();
            $table->string('occupation')->nullable();
            $table->integer('status')->default(false)->nullable();
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
        Schema::dropIfExists('requests');
    }
}
