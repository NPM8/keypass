<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_passwords', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('password');
            $table->string('url')->nullable(true);
            $table->string('username')->nullable(true);
            $table->longText('comment')->nullable(true);
            $table->timestamps();
        });

        Schema::create('password_private', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('password');
            $table->string('url')->nullable(true);
            $table->string('username')->nullable(true);
            $table->longText('comment')->nullable(true);
            $table->integer('user_id');
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
        Schema::dropIfExists('passwords');

        Schema::dropIfExists('passwords_private');

    }
}
