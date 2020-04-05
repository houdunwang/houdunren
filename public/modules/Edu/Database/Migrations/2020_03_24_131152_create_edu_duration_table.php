<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduDurationTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('edu_duration', function (Blueprint $table) {
      $table->bigIncrements('id');
      table_foreign_site($table);
      table_foreign_user($table);
      $table->dateTime('begin_time');
      $table->dateTime('end_time');
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
    Schema::dropIfExists('edu_duration');
  }
}
