<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 内容
 * @package
 */
class CreateArticleContentsTable extends Migration
{
    public function up()
    {
        Schema::create('article_contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title', 100)->nullable()->comment('标题');
            $table->string('url')->nullable()->comment('跳转链接');
            $table->text('content')->nullable()->comment('内容');
            $table->string('source', 30)->nullable()->comment('来源');
            $table->unsignedInteger('click')->default(0)->comment('点击数');
            $table->string('thumb')->nullable()->comment('缩略图');
            $table->string('description')->nullable()->comment('文章介绍');
            $table->json('fields')->nullable()->comment('扩展字段');
            $table->string('template')->nullable()->comment('模板');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('article_contents');
    }
}
