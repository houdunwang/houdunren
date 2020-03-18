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
      table_foreign_user($table);
      table_foreign_site($table);
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
