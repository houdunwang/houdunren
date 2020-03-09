<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduTagTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('edu_tag', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->char('name', 20)->unique()->comment('标签名');
      table_foreign($table, 'sites', 'site_id');
      $table->char('group', 20)->comment('标签分组');
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
    Schema::dropIfExists('edu_tag');
  }
}
