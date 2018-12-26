<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldLessonIdToEduUserVideos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('edu_user_videos', function (Blueprint $table) {
            $table->unsignedInteger('lesson_id')->comment('课程编号');
            $table->foreign('lesson_id')->references('id')->on('edu_lessons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('edu_user_videos', function (Blueprint $table) {
            $table->dropColumn('lesson_id');
        });
    }
}
