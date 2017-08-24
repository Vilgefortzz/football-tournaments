<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->enum('label', ['group', '1/16', '1/8', '1/4', '1/2', 'third place', 'final']);
            $table->dateTime('start_date_and_time');
            $table->dateTime('end_date_and_time');
            $table->string('first_club')->nullable();
            $table->string('second_club')->nullable();
            $table->integer('result_first_club')->unsigned()->default(0);
            $table->integer('result_second_club')->unsigned()->default(0);
            $table->string('winner')->nullable();
            $table->enum('status', ['created', 'ready', 'completed', 'close'])->default('created');
            $table->integer('tournament_id')->unsigned()->index();

            $table->foreign('tournament_id')->references('id')->on('tournaments')
                ->onDelete('cascade');

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
