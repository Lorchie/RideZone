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
            $table->binary('photo');
            $table->enum('typePlage',['sable','galets','herbe','beton','rocheux','terre']);
            $table->string('interdiction');
            $table->boolean('famille');
            $table->enum('frequentation',['faible','moyen','beaucoup']);
            $table->string('danger');
            $table->string('accesParking');
            $table->float('longitude')->unique();
            $table->float('latitude')->unique();
            $table->enum('valider',['enCours','aVerifier','ok']);
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
