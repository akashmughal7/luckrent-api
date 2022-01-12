<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('phone_no','12')->nullable();
            $table->string('location')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('language')->nullable();
            $table->string('role')->nullable();
            $table->integer('unit')->unsigned()->nullable();
            $table->string('rupees')->nullable();
            $table->string('member_id')->nullable();
            $table->boolean('active')->default(true);
            $table->string('profile_picture')->nullable();
            $table->string('path')->nullable();
            $table->string('activation_token')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
