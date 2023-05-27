<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('short_videos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('视频标题');
            $table->string('path', 800)->comment('视频地址');
            $table->string('preview', 800)->comment('预览图');
            $table->unsignedInteger('view_num')->default(0)->comment('观看次数');
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('short_videos');
    }
};
