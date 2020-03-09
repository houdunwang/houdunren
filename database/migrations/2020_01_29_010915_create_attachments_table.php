<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentsTable extends Migration
{
  /**
   * 上传文件
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('attachments', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('name')->comment('原文件名');
      $table->string('path')->comment('文件地址');
      table_foreign($table, 'sites', 'site_id');
      table_foreign($table, 'users', 'user_id');
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
    Schema::dropIfExists('attachments');
  }
}
