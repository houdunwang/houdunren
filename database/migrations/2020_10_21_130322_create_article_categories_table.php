<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleCategoriesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('article_categories', function (Blueprint $table) {
      $table->id();
      $table->foreignId('site_id')->constrained()->onDelete('cascade');
      $table->foreignId('user_id')->constrained()->onDelete('cascade');
      $table->foreignId('model_id')->constrained('article_models')->onDelete('cascade');
      $table->bigInteger('pid')->default(0)->comment('父级栏目');
      $table->string('title')->comment('样式名称');
      $table->char('type')->default('list')->comment('模板类型');
      $table->string('thumb')->nullable()->comment('缩略图');
      $table->string('description')->nullable()->comment('简短介绍');
      $table->string('url')->nullable()->comment('栏目跳转链接');
      $table->string('template_index')->default('index')->comment('封面模板');
      $table->string('template_list')->default('list')->comment('列表模板');
      $table->string('template_content')->default('content')->comment('内容模板');
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
    Schema::dropIfExists('article_categories');
  }
}
