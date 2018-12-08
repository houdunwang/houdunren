<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreditToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->char('credit1')->default(0);
            $table->char('credit2')->default(0);
            $table->char('credit3')->default(0);
            $table->char('credit4')->default(0);
            $table->char('credit5')->default(0);
            $table->char('credit6')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('credit1');
            $table->dropColumn('credit2');
            $table->dropColumn('credit3');
            $table->dropColumn('credit4');
            $table->dropColumn('credit5');
            $table->dropColumn('credit6');
        });
    }
}
