<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduTagRelationTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('edu_tag_relation', function (Blueprint $table) {
      table_foreign($table, 'edu_tag', 'tag_id');
      $table->unsignedBigInteger('relation_id')->index();
      $table->string('relation_type')->index();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('edu_tag_relation');
  }
}
