<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumntoSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            //

            $table->string('about');
            $table->string('jourheureOfappel');
            $table->string('adresse2');
            $table->string('City');
            $table->string('country');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
            $table->dropColumn('about');
            $table->dropColumn('jourheureOfappel');
            $table->dropColumn('adresse2');
            $table->dropColumn('City');
            $table->dropColumn('country');
        });
    }
}
