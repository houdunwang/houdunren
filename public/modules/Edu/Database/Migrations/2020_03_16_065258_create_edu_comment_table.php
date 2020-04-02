<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 评论
 * @package
 */
class CreateEduCommentTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('edu_comment', function (Blueprint $table) {
      $table->bigIncrements('id');
      table_foreign_site($table);
      table_foreign_user($table);
      table_foreign($table, 'users', 'reply_user_id', '回复用户');
      $table->text('content');
      $table->unsignedMediumInteger('favour_count')->nullable()->comment('点赞统计');
      $table->unsignedBigInteger('comment_id');
      $table->string('comment_type');
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
    Schema::dropIfExists('edu_comment');
  }
}
