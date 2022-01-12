<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('rental_address')->nullable();
            $table->string('property')->nullable();
            $table->string('tenant')->nullable();
            $table->string('expense_category')->nullable();
            $table->string('amount')->nullable();
            $table->string('transaction_date')->nullable();
            $table->string('repeat')->nullable();
            $table->string('as_paid')->nullable();
            $table->string('payee')->nullable();
            $table->text('expense_description')->nullable();
            $table->string('expanse_type')->nullable();
            $table->string('amount_x')->nullable();
            $table->string('category_x')->nullable();
            $table->string('status')->nullable();
            $table->string('on_paid')->nullable();
            $table->string('tax_status')->nullable();
            $table->string('rent_invoice')->nullable();
            $table->string('recurring')->nullable();
            $table->text('expense_notes')->nullable();
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
        Schema::dropIfExists('expenses');
    }
}
