<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    //提交
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->comment('栏目名称');
            $table->unsignedInteger('pid')->comment('父级栏目');
        });
    }

    //回滚
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
