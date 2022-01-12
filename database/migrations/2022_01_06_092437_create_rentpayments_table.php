<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentpaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentpayments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('renter_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('property_id')->unsigned()->nullable();
            $table->string('paymant_method')->nullable();
            $table->string('recieved_cheque')->nullable();
            $table->string('reminded_cheque')->nullable();
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
        Schema::dropIfExists('rentpayments');
    }
}
