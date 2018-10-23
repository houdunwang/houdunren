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
            $table->string('name');
            $table->string('title');
            $table->text('permission');
            $table->text('center_menu')->comment('会员中心菜单');
            $table->unsignedTinyInteger('center_menu_setting')->default(1)->comment('会员中心菜单设置:1全站显示 2本模块显示(需要配置域名) 3不显示');
            $table->text('space_menu')->comment('个人主页菜单');
            $table->unsignedTinyInteger('space_menu_setting')->default(1)->comment('个人主页菜单设置:1全站显示 2本模块显示(需要配置域名) 3不显示');
            $table->text('admin_menu')->comment('后台菜单');
            $table->unsignedTinyInteger('system')->default(0);
            $table->string('domain')->nullable()->comment('模块独立域名');
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
