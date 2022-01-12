<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('renter_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('property_id')->unsigned()->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('rent')->nullable();
            $table->string('security_deposit')->nullable();
            $table->string('pet_deposit')->nullable();
            $table->string('rent_due')->nullable();
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
        Schema::dropIfExists('leases');
    }
}
