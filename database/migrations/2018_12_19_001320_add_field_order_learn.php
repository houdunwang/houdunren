<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldOrderLearn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('edu_lessons', function (Blueprint $table) {
            $table->tinyInteger('order_learn')->comment('按顺序学习');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('edu_lessons', function (Blueprint $table) {
            $table->dropColumn('order_learn');
        });
    }
}
