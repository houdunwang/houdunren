<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//签到汇总
class CreateEduSignTotalTable extends Migration
{
    public function up()
    {
        Schema::create('edu_sign_total', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('site_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedInteger('total')->comment('总签到天数');
            $table->unsignedInteger('month')->comment('月签到天数');
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
        Schema::dropIfExists('edu_sign_total');
    }
}
