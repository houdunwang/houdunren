<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 套餐模块关联
 * @package
 */
class ModulePackage extends Migration
{
    public function up()
    {
        Schema::create('module_package', function (Blueprint $table) {
            $table->foreignId('module_id')->constrained();
            $table->foreignId('package_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('module_package');
    }
}
