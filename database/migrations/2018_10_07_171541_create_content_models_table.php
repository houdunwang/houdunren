<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentModelsTable extends Migration
{
    public function up()
    {
        Schema::create('content_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique()->comment('模型名称');
            $table->text('fields')->nullable();
            $table->unsignedTinyInteger('is_system')->default(0)->comment('系统模型');
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
        Schema::dropIfExists('content_models');
    }
}
