<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('订阅名称');
            $table->decimal('price')->comment('订阅价格');
            $table->string('description')->comment('订阅描述');
            $table->smallInteger('buy_month')->comment('订阅月数');
            $table->string('icon');
            $table->tinyInteger('status')->default(1)->comment('1:开启 0:关闭');
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
        Schema::dropIfExists('edu_shops');
    }
}
