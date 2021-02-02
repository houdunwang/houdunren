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
            $table->id('id');
            $table->string('name')->nullable()->comment('昵称');
            $table->string('email')->nullable()->unique();
            $table->string('mobile')->nullable()->unique();
            $table->string('real_name', 20)->nullable()->comment('真实姓名');
            $table->string('password')->nullable()->comment('密码');
            $table->string('home')->nullable()->comment('个人网站');
            $table->string('avatar')->nullable()->comment('头像');
            $table->string('weibo')->nullable()->comment('微博地址');
            $table->string('wechat')->nullable()->comment('微信号');
            $table->string('github')->nullable()->comment('GITHUB');
            $table->string('qq')->nullable()->comment('QQ');
            $table->string('wakatime')->nullable()->comment('wakatime');
            $table->bigInteger('group_id')->default(1)->comment('默认系统会员组');
            $table->timestamp('email_verified_at')->nullable()->comment('邮箱验证时间');
            $table->timestamp('mobile_verified_at')->nullable()->comment('手机验证时间');
            $table->unsignedInteger('favour_count')->default(0)->comment('点赞数');
            $table->unsignedInteger('favorite_count')->default(0)->comment('收藏数');
            $table->rememberToken();
            $table->timestamps();
            $table->unsignedTinyInteger('lock')->nullable()->comment('用户锁定');
            $table->unsignedInteger('credit1')->nullable();
            $table->unsignedInteger('credit2')->nullable();
            $table->unsignedInteger('credit3')->nullable();
            $table->unsignedInteger('credit4')->nullable();
            $table->unsignedInteger('credit5')->nullable();
            $table->unsignedInteger('credit6')->nullable();
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
