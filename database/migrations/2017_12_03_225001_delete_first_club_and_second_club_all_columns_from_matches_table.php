<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteFirstClubAndSecondClubAllColumnsFromMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->dropColumn(['first_club', 'first_club_emblem_dir', 'first_club_emblem',
                'second_club', 'second_club_emblem_dir', 'second_club_emblem']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->string('first_club')->nullable();
            $table->string('second_club')->nullable();
            $table->string('first_club_emblem_dir')->default('uploads/clubs/emblems/');
            $table->string('first_club_emblem')->default('default.jpg');
            $table->string('second_club_emblem_dir')->default('uploads/clubs/emblems/');
            $table->string('second_club_emblem')->default('default.jpg');
        });
    }
}
