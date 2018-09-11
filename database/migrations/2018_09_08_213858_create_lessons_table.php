<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title');
            $table->string('description')->nullable()->comment('课程介绍');
            $table->string('thumb');
            $table->char('type', 20)->default('video')->index()->comment('类型:system系统，video播客');
            $table->unsignedTinyInteger('free')->default(1)->index()->comment('免费课1是0否');
            $table->unsignedTinyInteger('subscibe_play')->default(1)->index()->comment('定阅用户免费观看');
            $table->tinyInteger('free_num')->default(0)->index()->comment('免费观看数量');
            $table->decimal('price')->nullable()->comment('售价');
            $table->tinyInteger('is_commend')->nullable()->index();
            $table->tinyInteger('is_hot')->nullable()->index();
            $table->mediumInteger('click')->default(0)->comment('查看次数');
            $table->string('times')->nullable()->comment('课程总时长');
            $table->tinyInteger('status')->default(1)->comment('状态');
            $table->string('download_address')->nullable()->comment('下载地址');
            $table->unsignedInteger('user_id');
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
}
