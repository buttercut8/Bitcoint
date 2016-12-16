<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('User', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',150);
            $table->string('last_name',150);
            $table->string('last_name_initial',1);
            $table->string('city',150);
            $table->string('state',150);
            $table->integer('zip_code');
            $table->string('country',150);
            $table->string('upline_email_address',150);
            $table->string('email',150)->unique();
            $table->string('username')->unique();
            $table->string('password');
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
        Schema::dropIfExists('User');
    }
}
