<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GroupPackage extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('group_package', function (Blueprint $table) {
      $table->unsignedBigInteger('group_id')->nullable()->comment('会员组编号');
      $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
      $table->unsignedBigInteger('package_id')->nullable()->comment('套餐编号');
      $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
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
