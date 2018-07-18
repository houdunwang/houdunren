<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    //提交
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('title')->comment('模块名称|input');
            $table->string('name')->comment('模块标识|input');
            $table->string('is_default')->nullable()->comment('默认模块|radio|1:是,0:否');
            $table->string('front_access')->comment('开启|radio|1:是,0:否');
        });
    }

    //回滚
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
