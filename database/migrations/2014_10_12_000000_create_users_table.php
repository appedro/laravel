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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('phone3');
            $table->string('phone4');
            $table->string('phone5');
            $table->string('phone6');
            $table->string('birthday');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('district');
            $table->string('city');
            $table->string('number');
            $table->string('UF');
            $table->string('complement');
            $table->string('zip');
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
