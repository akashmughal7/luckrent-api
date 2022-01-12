<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectiontenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspectiontenants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('inspection_id')->unsigned()->nullable();
            $table->string('tenant_firstname')->nullable();
            $table->string('tenant_middlename')->nullable();
            $table->string('tenant_lastname')->nullable();
            $table->string('tenant_streetno')->nullable();
            $table->string('tenant_unit')->nullable();
            $table->string('tenant_province')->nullable();
            $table->string('tenant_postalcode')->nullable();
            $table->string('possession_date')->nullable();
            $table->string('movein_date')->nullable();
            $table->string('moveout_date')->nullable();
            $table->string('moveininspection_date')->nullable();
            $table->string('moveoutinspection_date')->nullable();
            $table->string('tenantagent_name')->nullable();
            $table->text('add_comments')->nullable();
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
        Schema::dropIfExists('inspectiontenants');
    }
}
