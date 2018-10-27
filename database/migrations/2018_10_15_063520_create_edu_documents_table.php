<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_documents', function (Blueprint $table) {
            $table->increments('id');
			$table->string('title')->comment('文档标题');
			$table->text('content')->commetn('文档介绍');
//			$table->text('menus')->comment('文档列表');
			$table->integer('user_id')->index()->comment('用户id');
			$table->tinyInteger('flag')->nullable()->comment('1热门,2推荐,3正常');
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
        Schema::dropIfExists('edu_documents');
    }
}
