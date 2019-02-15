<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupPackage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_package', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('group_id')->comment('用户组编号');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->unsignedInteger('package_id')->comment('套餐编号');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
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
        Schema::dropIfExists('group_package');
    }
}
