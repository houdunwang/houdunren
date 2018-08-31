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
            $table->string('name')->unique()->nullable()->comment('昵称');
            $table->string('email')->unique()->nullable()->index()->comment('邮箱');
            $table->string('mobile')->unique()->nullable()->index()->comment('手机');
            $table->string('password');
            $table->string('icon')->nullable()->comment('头像');
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
