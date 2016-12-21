<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('first_name',150);
            $table->string('last_name',150);
            $table->string('last_name_initial',10);
            $table->string('city',150);
            $table->string('state',150);
            $table->integer('zip_code');
            $table->string('country',150);
            $table->string('upline_email_address',150)->nullable();
            $table->string('email',150)->unique();
            $table->string('username',100)->unique();
            $table->string('password');
            $table->string('ip_address',100);
            $table->string('bitcoin',50);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
