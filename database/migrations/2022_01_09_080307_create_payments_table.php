<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('leasess_id')->unsigned()->nullable();
            $table->integer('property_code')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('rental_address')->nullable();
            $table->string('income_method')->nullable();
            $table->string('payer')->nullable();
            $table->string('amount')->nullable();
            $table->string('paid_with')->nullable();
            $table->string('recieved_date')->nullable();
            $table->string('from_date')->nullable();
            $table->enum('tex_status',['non taxable','taxable'])->nullable();
            $table->text('payment_notes')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
