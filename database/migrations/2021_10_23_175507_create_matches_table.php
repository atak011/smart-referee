<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->string('home',100);
            $table->string('away',100);
            $table->tinyInteger('home_score');
            $table->tinyInteger('away_score');
            $table->tinyInteger('league');
            $table->integer('year');
            $table->boolean('is_cl');
            $table->boolean('is_ul');
            $table->string('result_score',5);
            $table->tinyInteger('result');
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
        Schema::dropIfExists('matches');
    }
}
