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
            $table->string('name');
            $table->string('email')->default('')->comment('邮箱');
            $table->string('mobile')->default('')->comment('手机');
            $table->string('password');
            $table->string('token')->comment('邮箱或手机验证码');
            $table->tinyInteger('email_valid')->default(0)->comment('邮箱验证状态');
            $table->tinyInteger('mobile_valid')->default(0)->comment('手机号验证状态');
            $table->tinyInteger('is_admin')->default(0)->comment('管理员');
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
