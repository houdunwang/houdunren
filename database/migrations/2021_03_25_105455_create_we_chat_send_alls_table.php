<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 微信群发
 * @package
 */
class CreateWeChatSendAllsTable extends Migration
{
    public function up()
    {
        Schema::create('we_chat_send_alls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wechat_id')->constrained('we_chats')->onDelete('cascade');
            $table->foreignId('module_id')->nullable()->constrained()->onDelete('cascade')->commit('模块');
            $table->string('title')->comment('群发描述');
            $table->foreignId('media_id')->constrained('we_chat_materials')->onDelete('cascade');
            $table->json('content')->nullable()->comment('发送内容');
            $table->json('response')->nullable()->comment('微信响应数据');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('we_chat_send_alls');
    }
}
