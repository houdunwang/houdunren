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
            $table->foreignId('site_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('external_address')->comment('外部直播地址');
            $table->tinyInteger('type')->default(1)->comment('直播地址：1:站外,2:站内');
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
