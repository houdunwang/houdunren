<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('title')->comment('模块名称');
            $table->string('name')->unique()->comment('模块标识');
            $table->string('version')->comment('版本号');
            $table->string('preview')->comment('预览图');
            $table->tinyInteger('local')->default(true)->comment('本地模块');
            $table->text('package')->comment('模块配置');
            $table->text('permissions')->nullable()->comment('权限');
            $table->tinyInteger('subscribe')->index()->comment('微信订阅消息处理');
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
