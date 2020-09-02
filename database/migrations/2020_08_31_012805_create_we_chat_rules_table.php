<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeChatRulesTable extends Migration
{
    public function up()
    {
        Schema::create('we_chat_rules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_id')->constrained()->onDelete('cascade');
            $table->foreignId('module_id')->constrained()->onDelete('cascade');
            $table->foreignId('wechat_id')->constrained('we_chats')->onDelete('cascade');
            $table->string('type')->comment('类型');
            $table->string('title')->comment('规则名称');
            $table->json('options')->nullable()->comment('模块的规则选项');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('we_chat_rules');
    }
}
