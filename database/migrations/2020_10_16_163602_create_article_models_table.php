<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleModelsTable extends Migration
{

  public function up()
  {
    Schema::create('article_models', function (Blueprint $table) {
      $table->id();
      $table->string('title')->comment('模型名称');
      $table->foreignId('site_id')->constrained()->onDelete('cascade');
      $table->string('description')->comment('模型描述');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('article_models');
  }
}
