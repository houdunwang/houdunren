<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
  /**
   * 套餐
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('packages', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->char('name', 20)->unique()->comment('套餐名称');
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
    Schema::dropIfExists('packages');
  }
}
