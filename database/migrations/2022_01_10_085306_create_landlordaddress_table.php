<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandlordaddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landlordaddress', function (Blueprint $table) {
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
            $table->string('landlord_firstname')->nullable();
            $table->string('landlord_lastname')->nullable();
            $table->string('landlord_middlename')->nullable();
            $table->string('address')->nullable();
            $table->string('landlord_unit')->nullable();
            $table->string('landlord_street_no')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
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
        Schema::dropIfExists('landlordaddress');
    }
}
