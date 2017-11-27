<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFirstClubAndSecondClubEmblemColumnsToMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->string('first_club_emblem_dir')->default('uploads/clubs/emblems/')
                ->after('first_club');
            $table->string('first_club_emblem')->default('default.jpg')
                ->after('first_club_emblem_dir');
            $table->string('second_club_emblem_dir')->default('uploads/clubs/emblems/')
                ->after('second_club');
            $table->string('second_club_emblem')->default('default.jpg')
                ->after('second_club_emblem_dir');
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
            $table->dropColumn(['second_club_emblem', 'second_club_emblem_dir', 'first_club_emblem', 'first_club_emblem_dir']);
        });
    }
}
