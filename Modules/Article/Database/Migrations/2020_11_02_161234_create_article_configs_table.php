<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleConfigsTable extends Migration
{
  public function up()
  {
    Schema::create('article_configs', function (Blueprint $table) {
      $table->id();
      $table->foreignId("site_id")->constrained();
      $table->json('config')->nullable()->comment('配置项');
      $table->string('tempalte')->default('default')->comment('模板风格');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('article_configs');
  }
}
