<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduVideoExamLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_video_exam_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('video_id');
            $table->foreign('video_id')->references('id')->on('edu_videos')->onDelete('cascade');
            $table->unsignedInteger('user_id');
            $table->tinyInteger('grade')->comment('成绩');
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
        Schema::dropIfExists('edu_video_exam_logs');
    }
}
