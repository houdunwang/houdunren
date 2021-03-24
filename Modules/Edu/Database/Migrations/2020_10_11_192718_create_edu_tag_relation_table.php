<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//标签中间表
class CreateEduTagRelationTable extends Migration
{
    public function up()
    {
        Schema::create('edu_tag_relation', function (Blueprint $table) {
            $table->foreignId('tag_id')->constrained('edu_tag')->onDelete('cascade');
            $table->morphs('relation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edu_tag_relation');
    }
}
