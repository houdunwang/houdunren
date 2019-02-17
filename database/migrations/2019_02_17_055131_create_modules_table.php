<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('模块名称');
            $table->string('name')->comment('模块标识');
            $table->tinyInteger('local')->comment('本地模块');
            $table->text('package')->comment('模块配置');
            $table->text('permissions')->nullable()->comment('权限列表');
            $table->text('menus')->nullable()->comment('menus');
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
        Schema::dropIfExists('modules');
    }
}
