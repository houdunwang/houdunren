<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCloudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clouds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('api_host')->nullable()->comment('云主机地址');
            $table->string('build')->nullable()->comment('版本编译号');
            $table->string('access_token',2000)->nullable()->comment('token');
            $table->string('refresh_token',2000)->nullable()->comment('refresh_token');
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
        Schema::dropIfExists('clouds');
    }
}
