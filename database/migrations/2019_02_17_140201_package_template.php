<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PackageTemplate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_template', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('package_id')->comment('用户组编号');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
            $table->unsignedInteger('template_id')->comment('用户组编号');
            $table->foreign('template_id')->references('id')->on('templates')->onDelete('cascade');
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
        Schema::dropIfExists('package_template');
    }
}
