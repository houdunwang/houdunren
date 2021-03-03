<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 标签
 * @package
 */
class CreateArticleTagsTable extends Migration
{
    public function up()
    {
        Schema::create('article_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('model_id')->constrained('article_models')->onDelete('cascade');
            $table->char('title', 20)->comment('标签名称');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('article_tags');
    }
}
