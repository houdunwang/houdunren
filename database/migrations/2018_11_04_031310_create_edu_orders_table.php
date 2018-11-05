<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id')->unique()->comment('订单号');
            $table->unsignedInteger('shop_id')->nullable()->comment('订阅编号');
            $table->unsignedInteger('lesson_id')->nullable()->comment('课程编号');
            $table->unsignedInteger('user_id')->index();
            $table->unsignedTinyInteger('status')->default(0)->comment('定单状态');
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
        Schema::dropIfExists('edu_orders');
    }
}
