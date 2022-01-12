<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectionexpensesfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspectionexpensesfiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('inspection_id')->unsigned()->nullable();
            $table->integer('inspectiontenant_id')->unsigned()->nullable();
            $table->integer('entrycondition_id')->unsigned()->nullable();
            $table->integer('endcondition_id')->unsigned()->nullable();
            $table->integer('tag_id')->unsigned()->nullable();
            $table->integer('tenancy_id')->unsigned()->nullable();
            $table->integer('inspectionexpense_id')->unsigned()->nullable();
            $table->integer('tenantaddres_id')->unsigned()->nullable();
            $table->integer('landlordaddres_id')->unsigned()->nullable();
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
        Schema::dropIfExists('inspectionexpensesfiles');
    }
}
