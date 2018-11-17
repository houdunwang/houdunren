<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduTagRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_tag_relations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tag_id')->index();
            $table->foreign('tag_id')->references('id')->on('edu_tags')->onDelete('cascade');
            $table->unsignedInteger('relation_id');
            $table->string('relation_type');
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
        Schema::dropIfExists('edu_tag_relations');
    }
}
