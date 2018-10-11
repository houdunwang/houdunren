<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('category_id')->index();
            $table->foreign('category_id')->references('id')->on('content_categories')->onDelete('cascade');
            $table->string('source')->nullable()->comment('来源');
            $table->string('author')->nullable()->comment('作者');
            $table->string('thumb')->nullable()->comment('缩略图');
            $table->string('description')->nullable()->comment('摘要');
            $table->text('content');
            $table->string('redirect_url')->nullable()->comment('跳转链接');
            $table->string('click')->default(0)->comment('查看次数');
            $table->string('template')->nullable()->comment('自定义模板');
            $table->unsignedInteger('user_id')->index();
            $table->mediumText('fields')->nullable()->comment('扩展字段');
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
        Schema::dropIfExists('content_articles');
    }
}
