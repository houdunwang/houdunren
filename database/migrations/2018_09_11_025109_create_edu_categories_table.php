<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('edu_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->tinyInteger('system')->default(0)->comment('系统模块');
            $table->text('description')->nullable()->comment('分类描述');
            $table->string('icon')->nullable()->comment('图标');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('edu_categories');
    }
}
