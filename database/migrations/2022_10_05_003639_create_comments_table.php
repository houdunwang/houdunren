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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->comment('评论发表者');
            $table->foreignId('reply_user_id')->nullable()->constrained('users')->onDelete('cascade')->comment('回复哪个用户的评论');
            $table->foreignId('comment_id')->nullable()->constrained('comments')->onDelete('cascade')->comment('回复的评论ID');
            $table->text('content')->comment('评论内容');
            $table->morphs('commentable');
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
        Schema::dropIfExists('comments');
    }
};
