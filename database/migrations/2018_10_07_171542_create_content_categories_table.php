<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('model_id')->index();
            $table->foreign('model_id')->references('id')->on('content_models')->onDelete('cascade');
            $table->unsignedInteger('parent_id')->default(0)->comment('父级栏目');
            $table->unsignedTinyInteger('is_homepage')->default(0)->comment('封面栏目');
            $table->string('description')->nullable()->comment('栏目描述');
            $table->string('redirect_url')->nullable()-> comment('跳转链接');
            $table->string('index_template')->default('home.blade.php')->comment('封面模板');
            $table->string('list_template')->default('list.blade.php')->comment('栏目模板');
            $table->string('article_template')->default('article.blade.php')->comment('内容页模板');
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
        Schema::dropIfExists('content_categories');
    }
}
