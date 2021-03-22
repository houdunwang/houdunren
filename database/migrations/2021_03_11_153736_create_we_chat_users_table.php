<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeChatUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('we_chat_users', function (Blueprint $table) {
      $table->id();
      $table
        ->foreignId('site_id')
        ->nullable()
        ->constrained()
        ->onDelete('cascade');
      $table
        ->foreignId('wechat_id')
        ->nullable()
        ->constrained('we_chats')
        ->onDelete('cascade');
      $table
        ->foreignId('user_id')
        ->constrained()
        ->onDelete('cascade');
      $table
        ->char('type', 30)
        ->nullable()
        ->comment('类型:web/wechat/mini');
      $table
        ->string('openid')
        ->unique()
        ->nullable()
        ->comment('微信 openid');
      $table
        ->string('unionid')
        ->unique()
        ->nullable()
        ->comment('微信 unionid');

      $table->string('nickname')->nullable();
      $table->tinyInteger('sex')->nullable();
      $table->string('city')->nullable();
      $table->string('country')->nullable();
      $table->string('province')->nullable();
      $table->string('language')->nullable();
      $table->string('headimgurl')->nullable();
      $table->timestamp('subscribe_time')->nullable();
      $table->string('remark')->nullable();
      $table
        ->unsignedMediumInteger('groupid')
        ->nullable()
        ->default(0);
      $table->json('tagid_list')->nullable();
      $table
        ->string('subscribe_scene')
        ->nullable()
        ->comment('返回用户关注的渠道来源');
      $table->string('qr_scene')->nullable();
      $table->string('qr_scene_str')->nullable();
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
    Schema::dropIfExists('we_chat_users');
  }
}
