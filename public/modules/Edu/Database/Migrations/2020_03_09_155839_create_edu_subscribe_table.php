<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduSubscribeTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('edu_subscribe', function (Blueprint $table) {
      $table->bigIncrements('id');
      table_foreign_site($table);
      $table->string('title')->unique()->comment('套餐标题');
      $table->string('ad')->comment('套餐介绍');
      $table->string('icon', 50)->comment('图标');
      $table->decimal('price')->comment('价格');
      $table->tinyInteger('month')->unique()->comment('套餐月数');
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
    Schema::dropIfExists('edu_subscribe');
  }
}
