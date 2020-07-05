<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupPackageTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('group_package', function (Blueprint $table) {
      $table->id();
      $table
        ->foreignId('group_id')
        ->constrained()
        ->onDelete('cascade');
      $table
        ->foreignId('package_id')
        ->constrained()
        ->onDelete('cascade');
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
    Schema::dropIfExists('group_package');
  }
}
