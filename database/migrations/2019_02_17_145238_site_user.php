<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiteUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('site_id')->comment('站点编号');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
            $table->unsignedInteger('user_id')->comment('站点编号');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('role')->comment('角色类型');
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
        Schema::dropIfExists('site_user');
    }
}
