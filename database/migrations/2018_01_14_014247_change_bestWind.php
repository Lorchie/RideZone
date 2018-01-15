<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeBestWind extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post', function ($table) {
            $table->renameColumn('bestWindForce', 'bestWindForceMinus');
        });
        Schema::table('post', function($table) {
            $table->integer('bestWindForceMax');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post', function($table) {
            $table->dropColumn('bestWindForceMax');
        });
    }
}
