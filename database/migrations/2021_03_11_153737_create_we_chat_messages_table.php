<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 微信消息
 * @package
 */
class CreateWeChatMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('we_chat_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_id')->constrained()->onDelete('cascade');
            $table->foreignId('wechat_id')->constrained('we_chats')->onDelete('cascade');
            $table->foreignId('module_id')->nullable()->constrained()->onDelete('cascade')->commit('有值时将交给模块处理');
            $table->string('type')->nullable()->comment('消息类型')->comment('text:文本 news:文章 image:图片等');
            $table->string('title')->comment('规则名称');
            $table->string('keyword')->comment('关键词');
            $table->string('keyword_type', 30)->comment('匹配方式 base:普通文本 regexp:正则');
            $table->json('content')->nullable()->comment('回复内容');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('we_chat_messages');
    }
}
