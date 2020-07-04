<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('attachments', function (Blueprint $table) {
      $table->id();
      $table->string('path')->comment('文件路径');
      $table->string('name')->comment('文件名');
      $table->string('extension')->comment('扩展名');
      $table
        ->foreignId('user_id')
        ->constrained()
        ->onDelete('cascade');
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
