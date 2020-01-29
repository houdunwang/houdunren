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
            $table->string('name')->nullable()->comment('昵称');
            $table->string('email')->nullable()->unique();
            $table->string('mobile')->nullable()->unique();
            $table->string('real_name', 20)->nullable()->comment('真实姓名');
            $table->string('password')->nullable()->comment('密码');
            $table->string('weixin_openid')->nullable()->comment('微信OPENID');
            $table->string('weixin_unionid')->nullable()->comment('微信UNIONID');
            $table->string('home')->nullable()->comment('个人主页');
            $table->string('avatar')->nullable()->comment('头像');
            $table->string('token')->nullable()->comment('邮箱或手机验证码');
            $table->string('weibo')->nullable()->comment('微博地址');
            $table->string('wechat')->nullable()->comment('微信号');
            $table->string('github')->nullable()->comment('GITHUB');
            $table->string('qq')->nullable()->comment('QQ');
            $table->timestamp('email_verified_at')->nullable()->comment('邮箱验证时间');
            $table->timestamp('mobile_verified_at')->nullable()->comment('手机验证时间');
            $table->unsignedInteger('group_id')->nullable()->comment('管理员组');
            $table->timestamp('admin_end')->nullable()->comment('后台结束时间');
            $table->unsignedTinyInteger('admin_lock')->nullable()->comment('锁定后台操作');
            $table->unsignedMediumInteger('favour_count')->default(0)->comment('点赞数');
            $table->unsignedInteger('credit1')->nullable();
            $table->unsignedInteger('credit2')->nullable();
            $table->unsignedInteger('credit3')->nullable();
            $table->unsignedInteger('credit4')->nullable();
            $table->unsignedInteger('credit5')->nullable();
            $table->unsignedInteger('credit6')->nullable();
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