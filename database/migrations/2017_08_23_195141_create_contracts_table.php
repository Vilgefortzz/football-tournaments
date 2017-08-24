<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date_and_time_of_signing')->nullable();
            $table->enum('duration', ['1 week', '2 weeks', '1 month', '2 months']);
            $table->enum('status', ['created', 'accepted', 'signed', 'rejected', 'completed'])->default('created');
            $table->string('club_name');
            $table->string('user_name');
            $table->integer('club_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();

            $table->foreign('club_id')->references('id')->on('clubs');
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
        Schema::dropIfExists('contracts');
    }
}
