<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            table_foreign_site($table);
            table_foreign_user($table);
            $table->decimal('price')->comment('价格');
            $table->string('subject', 100)->comment('商品名称');
            $table->string('sn', 100)->index()->comment('定单号');
            $table->char('type', 20)->comment('类型:subscribe:订阅,lesson:课程');
            $table->tinyInteger('month')->nullable()->comment('订阅月数');
            table_foreign($table, 'edu_lessons', 'lesson_id', '课程编号');
            $table->tinyInteger('status')->default(0)->comment('支付状态');
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
        Schema::dropIfExists('edu_order');
    }
}
