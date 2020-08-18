<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//系统课程中间表
class CreateEduSystemLessonTable extends Migration
{
    public function up()
    {
        Schema::create('edu_system_lesson', function (Blueprint $table) {
            $table->foreignId('lesson_id')->constrained('edu_lessons')->onDelete('cascade');
            $table->foreignId('system_id')->constrained('edu_system')->onDelete('cascade');
            $table->unsignedSmallInteger('rank')->default(0)->comment('排序');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edu_system_lesson');
    }
}
