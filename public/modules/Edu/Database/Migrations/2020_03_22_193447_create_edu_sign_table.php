<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduSignTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('edu_sign', function (Blueprint $table) {
      $table->bigIncrements('id');
      table_foreign_site($table);
      table_foreign_user($table);
      $table->char('mood', 10)->comment('表情');
      $table->string('content')->comment('签到内容');
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
    Schema::dropIfExists('edu_sign');
  }
}
