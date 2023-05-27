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
        Schema::create('mornings', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->nullable()->constrained('users')->onDelete('cascade')->comment('获奖人');
            $table->string('image')->comment('礼品图片');
            $table->string('video', 500)->nullable()->comment('开箱视频');
            $table->string('url')->comment('奖品链接');
            $table->dateTime('end_time')->comment('开奖时间');
            $table->boolean('state')->default(false)->comment('活动状态');
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
        Schema::dropIfExists('mornings');
    }
};
