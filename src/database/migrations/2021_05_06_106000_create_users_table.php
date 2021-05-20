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
            $table->string('name')->index()->comment('ニックネーム');
            $table->string('email')->unique();
            $table->date('birthday');
            $table->string('prefecture')->index();
            $table->string('password');
            $table->string('profile_image')->nullable()->comment('プロフィール画像');
            $table->string('introduction')->nullable()->comment('紹介文');
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
