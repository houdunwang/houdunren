<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduLivesTable extends Migration
{
    public function up()
    {
        Schema::create('edu_lives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('site_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('push_path')->comment('推流地址');
            $table->string('play_path')->comment('播流地址');
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
        Schema::dropIfExists('edu_lives');
    }
}
