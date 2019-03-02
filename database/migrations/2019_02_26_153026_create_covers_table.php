<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('discription');
            $table->string('picurl');
            $table->string('url');
            tableForeign($table, 'sites', 'site_id');
            tableForeign($table, 'modules', 'module_id');
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
        Schema::dropIfExists('covers');
    }
}
