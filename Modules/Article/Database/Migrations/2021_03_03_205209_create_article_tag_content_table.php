<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 标签内容关联
 * @package
 */
class CreateArticleTagContentTable extends Migration
{
    public function up()
    {
        Schema::create('article_tag_content', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_id')->constrained('article_tags')->onDelete('cascade');
            $table->foreignId('content_id')->constrained('article_contents')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('article_tag_content');
    }
}
