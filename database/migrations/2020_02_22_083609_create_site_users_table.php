<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteUsersTable extends Migration
{
  public function up()
  {
    Schema::create('site_users', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('user_id')->comment('管理员');
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      $table->unsignedBigInteger('site_id')->comment('站点编号');
      $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
      $table->char('role', 10)->default('user')->comment('角色名称:admin/operator/user');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('site_users');
  }
}
