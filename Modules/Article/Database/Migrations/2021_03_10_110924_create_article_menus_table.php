<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 模块菜单
 * @package
 */
class CreateArticleMenusTable extends Migration
{
    public function up()
    {
        Schema::create('article_menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title')->comment('菜单名称');
            $table->string('url')->comment('跳转地址');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('article_menus');
    }
}
