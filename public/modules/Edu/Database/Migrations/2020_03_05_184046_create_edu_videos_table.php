<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduVideosTable extends Migration
{
  /**
   * Run the migrations.
   *
   * 课程视频
   * @return void
   */
  public function up()
  {
    Schema::create('edu_videos', function (Blueprint $table) {
      $table->bigIncrements('id');
      table_foreign($table, 'sites', 'site_id');
      table_foreign($table, 'edu_lessons', 'lesson_id');
      $table->string('title')->comment('视频标题');
      $table->text('path')->nullable()->comment('视频文件');
      $table->text('external_address')->nullable()->comment('外部播放地址');
      $table->unsignedSmallInteger('rank')->default(0)->comment('排序');
      $table->unsignedBigInteger('read_num')->default(0)->comment('查看次数');
      $table->unsignedBigInteger('zan_num')->default(0)->comment('点赞数');
      $table->unsignedBigInteger('favorite_num')->default(0)->comment('收藏数');
      $table->unsignedBigInteger('comment_num')->default(0)->comment('评论数');
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
    Schema::dropIfExists('edu_videos');
  }
}
