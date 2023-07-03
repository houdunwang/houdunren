<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('softs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('软件名称');
            $table->char('name', 30)->comment('软件别名');
            $table->char('version', 10)->default('1.0.1')->comment('版本号');
            $table->boolean('free')->default(true)->comment('是否免费');
            $table->string('description')->comment('软件简介');
            $table->string('lesson')->nullable()->comment('开发教程');
            $table->string('preview')->comment('封面截图');
            $table->string('tags')->nullable()->comment('软件标签');
            $table->text('content')->comment('使用说明');
            $table->string('download')->nullable()->comment('下载地址');
            $table->string('github')->nullable();
            $table->string('gitee')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('softs');
    }
};
