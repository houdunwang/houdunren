<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('site_id')->comment('站点编号');
            $table->string('token');
            $table->string('encodingaeskey');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
            $table->string('name')->comment('公众号名称');
            $table->string('account')->comment('微信号');
            $table->string('original')->comment('原始ID');
            $table->string('genre')->comment('公众号类型');
            $table->string('appid')->comment('AppId');
            $table->string('appsecret')->comment('AppSecret');
            $table->string('mch_id')->nullable()->comment('AppSecret');
            $table->string('key')->nullable()->comment('AppSecret');
            $table->string('apiclient_cert')->nullable()->comment('AppSecret');
            $table->string('apiclient_key')->nullable()->comment('AppSecret');
            $table->string('rootca')->nullable()->comment('AppSecret');
            $table->string('qr')->comment('二维码');
            $table->string('icon')->comment('图标');
            $table->string('welcome')->nullable()->comment('订阅欢迎消息');
            $table->string('default')->nullable()->comment('默认回复消息');
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
        Schema::dropIfExists('chats');
    }
}
