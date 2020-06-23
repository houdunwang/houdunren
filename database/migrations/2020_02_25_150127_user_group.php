<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 用户套餐组表
 * @package
 */
class UserGroup extends Migration
{
    public function up()
    {
        Schema::create('user_group', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('group_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_group');
    }
}
