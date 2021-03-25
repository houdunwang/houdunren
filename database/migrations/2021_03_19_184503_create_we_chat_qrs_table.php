<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 微信二维码
 * @package
 */
class CreateWeChatQrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('we_chat_qrs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wechat_id')->constrained('we_chats')->onDelete('cascade');
            $table->foreignId('module_id')->nullable()->constrained()->onDelete('cascade')->commit('模块');
            $table->string('title')->comment('二维码描述');
            $table->unsignedInteger('expire_seconds')->nullable()->comment('有效时间适用于临时二维码');
            $table->string('scene_type')->comment('场景类型');
            $table->string('scene_value')->comment('场景值');
            $table->json('response')->nullable()->comment('微信响应数据');
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
        Schema::dropIfExists('we_chat_qrs');
    }
}
