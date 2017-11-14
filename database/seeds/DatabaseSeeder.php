<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(ClubsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ContractsTableSeeder::class);
        $this->call(FootballPositionsTableSeeder::class);
        $this->call(TournamentsTableSeeder::class);
    }
}
