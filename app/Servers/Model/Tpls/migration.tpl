<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create{TABLE_CLASS}Table extends Migration
{
    public function up()
    {
        Schema::create('{TABLE}', function (Blueprint $table) {
            $table->increments('id');
            table_site_relation($table);
            {FIELDS}
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('{TABLE}');
    }
}
