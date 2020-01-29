<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * 套餐
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->char('name', 20)->unique()->comment('套餐名称');
            $table->unsignedTinyInteger('system')->nullable()->comment('系统套餐');
            $table->text('modules')->nullable()->comment('模块列表');
            $table->text('templates')->nullable()->comment('模板列表');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}