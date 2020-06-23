<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeChatsTable extends Migration
{
    /**
     * 微信帐户
     *
     * @return void
     */
    public function up()
    {
        Schema::create('we_chats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->foreignId('site_id')->constrained();
            $table->text('config')->nullable()->comment('配置');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('we_chats');
    }
}
