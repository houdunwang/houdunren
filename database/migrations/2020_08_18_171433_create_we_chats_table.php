<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeChatsTable extends Migration
{
    public function up()
    {
        Schema::create('we_chats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_id')->constrained()->onDelete('cascade');
            $table->string('title')->comment('公众号名称');
            $table->string('introduce')->comment('公众号介绍');
            $table->string('name')->nullable()->comment('微信号');
            $table->string('qr')->nullable()->comment('二维码');
            $table->string('token')->comment('TOKEN');
            $table->string('wechat_id')->nullable()->unique()->comment('原始ID');
            $table->string('appid')->unique();
            $table->string('appsecret');
            $table->string('welcome')->nullable()->comment('订阅时欢迎消息');
            $table->string('default_message')->nullable()->comment('默认回复消息');
            $table->json('menus')->nullable()->comment('微信菜单');
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
        Schema::dropIfExists('we_chats');
    }
}
