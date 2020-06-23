<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 套餐组关联
 * @package
 */
class GroupPackage extends Migration
{
    public function up()
    {
        Schema::create('group_package', function (Blueprint $table) {
            $table->foreignId('group_id')->constrained();
            $table->foreignId('package_id')->constrained();
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
