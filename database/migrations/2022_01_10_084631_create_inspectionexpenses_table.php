<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectionexpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspectionexpenses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('inspection_id')->unsigned()->nullable();
            $table->integer('inspectiontenant_id')->unsigned()->nullable();
            $table->integer('entrycondition_id')->unsigned()->nullable();
            $table->integer('endcondition_id')->unsigned()->nullable();
            $table->integer('tag_id')->unsigned()->nullable();
            $table->integer('tenancy_id')->unsigned()->nullable();
            $table->string('tenant_name')->nullable();
            $table->string('security_deposit')->nullable();
            $table->string('damage_deposit')->nullable();
            $table->string('date')->nullable();
            $table->string('landlord_signature_movein')->nullable();
            $table->string('tenant_signature_movein')->nullable();
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
        Schema::dropIfExists('inspectionexpenses');
    }
}
