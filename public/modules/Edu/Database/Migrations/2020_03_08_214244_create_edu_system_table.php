<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduSystemTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('edu_system', function (Blueprint $table) {
      $table->bigIncrements('id');
      table_foreign_site($table);
      table_foreign_user($table);
      $table->string('title')->comment('课程标题');
      $table->string('preview')->comment('预览图片');
      $table->string('description')->comment('课程介绍');
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
    Schema::dropIfExists('edu_system');
  }
}
