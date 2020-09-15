<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeChatMaterialsTable extends Migration
{
  public function up()
  {
    Schema::create('we_chat_materials', function (Blueprint $table) {
      $table->id();
      $table
        ->foreignId('site_id')
        ->nullable()
        ->constrained()
        ->onDelete('cascade');
      $table
        ->foreignId('module_id')
        ->nullable()
        ->constrained()
        ->onDelete('cascade');
      $table
        ->foreignId('wechat_id')
        ->constrained('we_chats')
        ->onDelete('cascade');
      $table->char('type', 30)->comment('素材类型');
      $table->string('media_id')->comment('素材media_id');
      $table->json('info')->comment('微信服务器素材资料');
      $table->json('content')->comment('本站服务器内容');
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
    Schema::dropIfExists('we_chat_materials');
  }
}
