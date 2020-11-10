<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleContentsTable extends Migration
{
  public function up()
  {
    Schema::create('article_contents', function (Blueprint $table) {
      $table->id();
      $table->foreignId('site_id')->constrained()->onDelete('cascade');
      $table->foreignId('user_id')->constrained()->onDelete('cascade');
      $table->foreignId('category_id')->constrained('article_categories')->onDelete('cascade');
      $table->string('title', 100)->nullable()->comment('标题');
      $table->string('thumb')->nullable()->comment('缩略图');
      $table->string('description')->nullable()->comment('简短介绍');
      $table->text('content')->nullable()->comment('内容');
      $table->string('url')->nullable()->comment('外部链接');
      $table->string('source')->nullable()->comment('来源');
      $table->string('author')->nullable()->comment('作者');
      $table->json('fields')->nullable()->comment('扩展字段');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('article_contents');
  }
}
