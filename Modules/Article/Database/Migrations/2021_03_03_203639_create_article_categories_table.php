<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 栏目
 * @package
 */
class CreateArticleCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('article_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('model_id')->nullable()->constrained('article_models')->onDelete('SET NULl');
            $table->tinyInteger('type')->default(1)->commit('1:普通栏目 2:封面栏目 3:单文章');
            $table->unsignedBigInteger('pid')->nullable()->comment('父级目录');
            $table->string('path')->index()->nullable()->comment('多级目录路径');
            $table->string('title')->comment('栏目名称');
            $table->string('preview')->nullable()->comment('缩略图');
            $table->string('keywords')->nullable()->comment('关键词');
            $table->string('description')->nullable()->comment('栏目描述');
            $table->string('url')->nullable()->comment('跳转链接');
            $table->text('content')->nullable()->comment('单文章内容');
            $table->string('category_template')->default('index.blade.php')->comment('栏目内容页模板');
            $table->string('index_template')->default('index.blade.php')->comment('封面模板');
            $table->string('list_template')->default('list.blade.php')->comment('列表模板');
            $table->string('content_template')->default('content.blade.php')->comment('内容页模板');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('article_categories');
    }
}
