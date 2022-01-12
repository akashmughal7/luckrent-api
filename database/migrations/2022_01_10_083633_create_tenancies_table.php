<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatetenanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenancies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('inspection_id')->unsigned()->nullable();
            $table->integer('inspectiontenant_id')->unsigned()->nullable();
            $table->integer('entrycondition_id')->unsigned()->nullable();
            $table->integer('endcondition_id')->unsigned()->nullable();
            $table->integer('tag_id')->unsigned()->nullable();
            $table->text('start_comment')->nullable();
            $table->string('start_status')->nullable();
            $table->text('end_comment')->nullable();
            $table->string('end_status')->nullable();
            $table->string('landlord_name')->nullable();
            $table->string('landlord_address')->nullable();
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
        Schema::dropIfExists('tenancies');
    }
}
