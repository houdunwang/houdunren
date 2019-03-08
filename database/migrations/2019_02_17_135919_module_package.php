<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModulePackage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_package', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('package_id')->comment('用户组编号');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
            $table->unsignedInteger('module_id')->comment('模块编号');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
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
        Schema::dropIfExists('module_package');
    }
}
