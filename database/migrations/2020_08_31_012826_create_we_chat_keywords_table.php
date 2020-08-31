<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeChatKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('we_chat_keywords', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rule_id')->constrained('we_chat_rules')->onDelete('cascade');
            $table->char('word', 10)->unique()->comment('微信关键词');
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
        Schema::dropIfExists('we_chat_keywords');
    }
}
