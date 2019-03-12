<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->index()->comment('域名');
            $table->unsignedInteger('site_id')->comment('站点编号');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
            $table->unsignedInteger('module_id')->comment('用户组编号');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
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
        Schema::dropIfExists('domains');
    }
}
