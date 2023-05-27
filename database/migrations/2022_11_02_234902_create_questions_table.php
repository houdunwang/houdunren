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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->nullable()->constrained('users')->onDelete('cascade')->comment('出题人');
            $table->text('description')->comment('考题描述');
            $table->char('type', 10)->comment("类型:radio/checkbox");
            $table->text('lists')->comment('答案选项');
            $table->string('answer')->coment('正确答案');
            $table->unsignedInteger('favour_count')->default(0)->comment('点赞数');
            $table->unsignedTinyInteger('rate')->default(0)->comment('评分');
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
        Schema::dropIfExists('questions');
    }
};
