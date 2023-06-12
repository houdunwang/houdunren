<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->unique()->comment('用户名');
            $table->string('password')->nullable();
            $table->string('nickname')->nullable()->comment("昵称");
            $table->string('email')->nullable()->unique();
            $table->string('mobile')->nullable()->uniqid();
            $table->tinyInteger('sex')->default(1)->comment('性别');
            $table->unsignedInteger('comment_num')->default(0)->comment('评论数量');
            $table->unsignedInteger('fans_num')->default(0)->comment('粉丝数量');
            $table->unsignedInteger('follower_num')->default(0)->comment('关注数量');
            $table->string('address')->nullable()->comment('地址');
            $table->string('real_name')->nullable()->comment('真实姓名');
            $table->string('avatar')->nullable();
            $table->string('home')->nullable();
            $table->string('weibo')->nullable();
            $table->string('wechat')->nullable();
            $table->string('github')->nullable();
            $table->string('qq')->nullable();
            $table->string('openid')->nullable()->unique();
            $table->string('unionid')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            // $table->string('secret')->nullable()->comment('软件密钥');
            $table->boolean('is_lock')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
