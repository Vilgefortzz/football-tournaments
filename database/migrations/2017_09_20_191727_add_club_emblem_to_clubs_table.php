<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClubEmblemToClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clubs', function (Blueprint $table) {
            $table->dropColumn('logo');
            $table->string('emblem_dir')->default('uploads/clubs/emblems/')->after('name');
            $table->string('emblem')->default('default.jpg')->after('emblem_dir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clubs', function (Blueprint $table) {
            $table->dropColumn('emblem');
            $table->dropColumn('emblem_dir');
            $table->string('logo')->default('logo_club_default.jpg');
        });
    }
}
