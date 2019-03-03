<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopCmsTable extends Migration
{
    public function up()
    {
        Schema::create('shop_cms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('build')->index()->comment('编译时间');
            $table->string('total')->comment('更新文件数');
            $table->text('logs')->comment('更新日志');
            $table->text('files')->comment('更新文件列表');
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
        Schema::dropIfExists('shop_cms');
    }
}
