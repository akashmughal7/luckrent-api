<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('role')->nullable();
            $table->string('property_type')->nullable();
            $table->string('property')->nullable();
            $table->string('property_code')->nullable();
            $table->string('property_address')->nullable();
            $table->string('property_postalcode')->nullable();
            $table->integer('unit')->unsigned()->nullable();
            $table->string('tenant_name')->nullable();
            $table->string('tenant_key')->nullable();
            $table->string('tenant_locker')->nullable();
            $table->string('tenant_parking')->nullable();
            $table->string('tenant_rent')->nullable();
            $table->string('utility_share')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
