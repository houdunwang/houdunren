<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatKeywordsTable extends Migration
{
    public function up()
    {
        Schema::create('chat_keywords', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('chat_rule_id')->index();
            $table->foreign('chat_rule_id')->references('id')->on('chat_rules')->onDelete('cascade');
            $table->string('content')->unique();
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
        Schema::dropIfExists('chat_keywords');
    }
}
