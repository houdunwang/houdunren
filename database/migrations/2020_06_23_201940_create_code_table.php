<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodeTable extends Migration
{
    public function up()
    {
        Schema::create('code', function (Blueprint $table) {
            $table->id();
            $table->char('account', 30)->index()->comment('邮箱或手机号');
            $table->string('code', 20)->comment('验证码');
            $table->char('ip', 30)->comment('发送IP');
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
        Schema::dropIfExists('code');
    }
}
