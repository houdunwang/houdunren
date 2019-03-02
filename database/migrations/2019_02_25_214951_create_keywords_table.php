<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keywords', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('描述');
            $table->string('key')->index()->comment('关键词');
            $table->char('tag', 30)->nullable()->index()->comment('标签用于区分处理方式,比如打news表示图文模块开发者可以自定义任何内容');
            $table->tinyInteger('system')->nullable()->index()->comment('系统处理');
            $table->unsignedInteger('model_id')->nullable()->index()->comment('多态关联');
            $table->string('model_type')->nullable()->index()->comment('多态关联');
            $table->unsignedInteger('site_id')->comment('站点编号');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
            $table->unsignedInteger('module_id')->comment('模块编号');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->unsignedInteger('chat_id')->comment('公众号编号');
            $table->foreign('chat_id')->references('id')->on('chats')->onDelete('cascade');
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
        Schema::dropIfExists('keywords');
    }
}
