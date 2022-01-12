<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeasessfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leasessfiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('leasess_id')->unsigned()->nullable();
            $table->integer('property_code')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
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
        Schema::dropIfExists('leasessfiles');
    }
}
