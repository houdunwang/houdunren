<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//标签表
class CreateEduTagTable extends Migration
{
    public function up()
    {
        Schema::create('edu_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('site_id')->constrained()->onDelete('cascade');
            $table->char('title', 20)->unique()->comment('标签名');
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
        Schema::dropIfExists('edu_tag');
    }
}
