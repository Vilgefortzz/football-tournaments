<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFootballPositionUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('football_position_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('football_position_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();

            $table->foreign('football_position_id')->references('id')->on('football_positions')
                ->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('football_position_user');
    }
}
