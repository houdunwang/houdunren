<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeChatTextsTable extends Migration
{
  public function up()
  {
    Schema::create('we_chat_texts', function (Blueprint $table) {
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
        ->foreignId('rule_id')
        ->constrained('we_chat_rules')
        ->onDelete('cascade');
      $table->json('contents')->comment('回复内容');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('we_chat_texts');
  }
}
