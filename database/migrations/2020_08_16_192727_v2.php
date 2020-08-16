<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class V2 extends Migration
{

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('openid')->unique()->nullable()->comment('微信 openid');
            $table->string('unionid')->unique()->nullable()->comment('微信 unionid');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('openid');
            $table->dropColumn('unionid');
        });
    }
}
