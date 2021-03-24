<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('followers', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table
        ->foreignId('user_id')
        ->constrained()
        ->onDelete('cascade');
      $table
        ->foreignId('follower_id')
        ->constrained('users')
        ->onDelete('cascade');
      $table
        ->foreignId('site_id')
        ->nullable()
        ->constrained()
        ->onDelete('cascade');
      $table
        ->foreignId('module_id')
        ->nullable()
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
    Schema::dropIfExists('followers');
  }
}
