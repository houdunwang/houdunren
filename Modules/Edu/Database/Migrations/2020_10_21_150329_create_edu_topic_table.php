<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//贴子
class CreateEduTopicTable extends Migration
{
    public function up()
    {
        Schema::create('edu_topic', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('site_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title')->comment('标题');
            $table->mediumText('content')->comment('正文');
            $table->unsignedInteger('favour_count')->default(0)->comment('点赞数');
            $table->unsignedInteger('favorite_count')->default(0)->comment('收藏数');
            $table->unsignedInteger('comment_count')->default(0)->comment('评论数');
            $table->tinyInteger('recommend')->default(0)->comment('推荐');
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
        Schema::dropIfExists('edu_topic');
    }
}
