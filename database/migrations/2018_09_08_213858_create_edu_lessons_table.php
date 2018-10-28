<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title');
            $table->string('description')->nullable()->comment('课程介绍');
            $table->string('thumb');
            $table->char('type', 20)->default('video')->index()->comment('类型:system系统，video播客');
            $table->tinyInteger('status')->default(1)->comment('1:上架 0:下架');
            $table->unsignedTinyInteger('free')->default(0)->index()->comment('1:免费课 0:收费');
            $table->unsignedTinyInteger('subscribe_free_play')->default(1)->index()->comment('定阅用户免费观看');
            $table->tinyInteger('free_num')->default(0)->index()->comment('免费观看数量');
            $table->decimal('price')->nullable()->comment('售价');
            $table->tinyInteger('is_commend')->nullable()->index();
            $table->tinyInteger('is_hot')->nullable()->index();
            $table->mediumInteger('click')->default(0)->comment('查看次数');
            $table->string('download_address')->nullable()->comment('下载地址');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('zan_num')->default(0);
            $table->unsignedInteger('favorite_num')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edu_lessons');
    }
}
