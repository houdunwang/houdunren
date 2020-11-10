<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleFieldsTable extends Migration
{
  public function up()
  {
    Schema::create('article_fields', function (Blueprint $table) {
      $table->id();
      $table->foreignId('site_id')->constrained()->onDelete('cascade');
      $table->foreignId('model_id')->constrained('article_models')->onDelete('cascade');
      $table->string("title")->comment('字段名称');
      $table->string('name')->comment('字段英文标识');
      $table->string('type')->comment('字段类型');
      $table->boolean('show')->default(true)->comment('显示字段');
      $table->string('value')->nullable()->comment('表单默认值');
      $table->string('rules')->nullable()->comment('验证规则');
      $table->string('errors')->nullable()->comment('正则验证错误提示');
      $table->string('placeholder')->nullable()->comment('提示信息');
      $table->boolean('required')->default(false)->comment('必须输入');
      $table->string('options')->nullable()->comment('单选或复选初始值');
      $table->json('ext')->nullable()->comment('扩展选项');
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
    Schema::dropIfExists('article_fields');
  }
}
