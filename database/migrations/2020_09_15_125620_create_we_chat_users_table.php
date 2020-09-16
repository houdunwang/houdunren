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
        ->string('openid')
        ->unique()
        ->nullable()
        ->comment('微信 openid');
      $table
        ->string('unionid')
        ->unique()
        ->nullable()
        ->comment('微信 unionid');

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
