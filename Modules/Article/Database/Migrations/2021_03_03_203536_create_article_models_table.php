<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 模型
 * @package
 */
class CreateArticleModelsTable extends Migration
{
    public function up()
    {
        Schema::create('article_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_id')->constrained()->onDelete('cascade');
            $table->char('title', 100)->comment('模型名称');
            $table->json('fields')->nullable()->comment('扩展字段配置');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('article_models');
    }
}
