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
      $table->string('placeholder')->nullable()->comment('提示信息');
      $table->boolean('required')->default(false)->comment('必须输入');
      $table->json('options')->nullable()->comment('字段其他选项');
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
