<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title')->comment("栏目名称|input");
            $table->mediumInteger('pid')->comment('父级栏目|select');
            $table->string('description')->default('')->comment("栏目描述|textarea");
            $table->string('pic')->default('')->comment("栏目图片|image");
            $table->string('datetime')->default('2019-2-22 12:22:34')->comment("日期时间|datetime");
            $table->string('date')->default('2019-2-22 12:22:34')->comment("日期|date");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_categories');
    }
}
