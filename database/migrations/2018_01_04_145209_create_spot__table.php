<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spot', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom')->unique();
            $table->string('description');
            $table->string('photo');
            $table->integer('type_plage_id')->unsigned();
            $table->foreign('type_plage_id')->references('id')->on('type_plage');
            $table->string('interdiction');
            $table->boolean('famille');
            $table->enum('frequentation',['faible','moyen','beaucoup']);
            $table->string('danger');
            $table->integer('parking_id')->unsigned();
            $table->foreign('parking_id')->references('id')->on('parking');
            $table->float('longitude',8,6)->unique();
            $table->float('latitude',8,6)->unique();
            $table->enum('valider',['aVerifier','ok']);
            $table->boolean('effet_thermique');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('spot');
    }
}
