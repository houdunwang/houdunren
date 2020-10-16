<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulePackageTable extends Migration
{
  public function up()
  {
    Schema::create('module_package', function (Blueprint $table) {
      $table->id();
      $table->foreignId('module_id')->constrained()->onDelete('cascade');
      $table->foreignId('package_id')->constrained()->onDelete('cascade');
      $table->timestamps();
    });
  }
  public function down()
  {
    Schema::dropIfExists('module_package');
  }
}
