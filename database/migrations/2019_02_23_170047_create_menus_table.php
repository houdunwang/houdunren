<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('site_id')->comment('用户组编号');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
            $table->unsignedInteger('module_id')->comment('用户组编号');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->string('title');
            $table->string('url');
            $table->unsignedSmallInteger('rank')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->string('icon');
            $table->char('type', 10);
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
        Schema::dropIfExists('menus');
    }
}
