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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('课程标题');
            $table->text('description')->nullable()->comment('课程介绍');
            $table->string('preview')->comment('缩略图');
            $table->string('video')->nullable()->comment('视频介绍');
            $table->decimal('price')->nullable()->comment('价格');
            $table->foreignId('system_id')->nullable()->constrained('systems')->onDelete('SET NULL');
            $table->string('download_address')->nullable()->comment('下载地址');
            $table->unsignedInteger('video_num')->default(0)->comment('视频数量');
            $table->unsignedInteger('view_num')->default(0)->comment('观看次数');
            $table->unsignedInteger('favorite_count')->default(0)->comment('收藏数');
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
        Schema::dropIfExists('lessons');
    }
};
