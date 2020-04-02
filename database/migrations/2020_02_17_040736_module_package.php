<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModulePackage extends Migration
{
  public function up()
  {
    Schema::create('module_package', function (Blueprint $table) {
      $table->unsignedBigInteger('module_id')->nullable()->comment('模块编号');
      $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
      $table->unsignedBigInteger('package_id')->nullable()->comment('套餐编号');
      $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
    });
  }

  public function down()
  {
    Schema::dropIfExists('module_package');
  }
}
