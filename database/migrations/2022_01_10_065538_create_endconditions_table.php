<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEndconditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endconditions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('inspection_id')->unsigned()->nullable();
            $table->integer('inspectiontenant_id')->unsigned()->nullable();
            $table->string('unit_name')->nullable();
            $table->string('end_condition')->nullable();
            $table->text('end_comments')->nullable();
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
        Schema::dropIfExists('endconditions');
    }
}
