<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
      $table->unsignedBigInteger('parent_id');
      table_foreign_site($table);
      table_foreign_user($table);
      $table->text('content');
      $table->unsignedBigInteger('comment_id');
      $table->string('comment_type');
      $table->unsignedMediumInteger('favour_count');
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
