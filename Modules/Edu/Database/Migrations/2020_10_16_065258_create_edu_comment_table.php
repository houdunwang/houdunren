<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//评论
class CreateEduCommentTable extends Migration
{
    public function up()
    {
        Schema::create('edu_comment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('site_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('reply_user_id')->constrained('users')->onDelete('cascade');
            $table->text('content');
            $table->unsignedMediumInteger('favour_count')->nullable()->comment('点赞统计');
            $table->unsignedBigInteger('comment_id');
            $table->string('comment_type');
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
        Schema::dropIfExists('edu_comment');
    }
}
