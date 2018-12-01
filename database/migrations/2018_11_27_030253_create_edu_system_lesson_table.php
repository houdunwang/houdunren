<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduSystemLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_system_lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->comment('系统课程描述');
            $table->string('lessons')->comment('课程编号');
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
        Schema::dropIfExists('edu_system_lessons');
    }
}
