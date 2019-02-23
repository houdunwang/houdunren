<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('we_chats', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('site_id')->comment('站点编号');
            $table->string('token');
            $table->string('EncodingAESKey');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
            $table->string('name')->comment('公众号名称');
            $table->string('account')->comment('微信号');
            $table->string('original')->comment('原始ID');
            $table->string('genre')->comment('公众号类型');
            $table->string('app_id')->comment('AppId');
            $table->string('app_secret')->comment('AppSecret');
            $table->string('qr')->comment('二维码');
            $table->string('icon')->comment('图标');
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
        Schema::dropIfExists('we_chats');
    }
}
