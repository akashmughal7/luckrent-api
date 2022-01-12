<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employmentdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('renter_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('property_id')->unsigned()->nullable();
            $table->string('company_name')->nullable();
            $table->string('job_title')->nullable();   
            $table->string('salary')->nullable();
            $table->string('contact_name')->nullable();    
            $table->string('contact_phone','12')->nullable();   
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
        Schema::dropIfExists('employmentdetails');
    }
}
