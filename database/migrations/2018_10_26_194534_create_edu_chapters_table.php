<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_chapters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('章节标题');
            $table->unsignedInteger('document_id')->index()->comment('文档编号');
            $table->foreign('document_id')->references('id')->on('edu_documents')->onDelete('cascade');
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
        Schema::dropIfExists('edu_chapters');
    }
}
