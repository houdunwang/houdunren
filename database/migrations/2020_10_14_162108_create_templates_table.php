<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('templates', function (Blueprint $table) {
      $table->id();
      $table->string('title')->unique()->comment('模块名称');
      $table->char('name', 50)->unique()->comment('模块标识');
      $table->string('description', 100)->comment('模块描述');
      $table->string('author')->comment('预览图');
      $table->string('version', 100)->comment('版本号');
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
    Schema::dropIfExists('templates');
  }
}
