<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('标题');
            $table->string('preview')->comment('预览图片');
            $table->text('description')->comment('课程介绍');
            $table->unsignedSmallInteger('order')->default(0)->comment('排序');
            $table->unsignedMediumInteger('lesson_num')->default(0)->comment('课程数量');
            $table->unsignedInteger('video_num')->default(0)->comment('视频数量');
            $table->unsignedInteger('view_num')->default(0)->comment('观看次数');
            $table->string('download_address')->nullable()->comment('下载地址');
            $table->char('type', 20)->default('system')->comment('课程类型 system|project');
            $table->index('type');
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
        Schema::dropIfExists('systems');
    }
};
