<?php

use App\Club;
use Illuminate\Database\Seeder;

class ClubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Create clubs for test
         */
        factory(Club::class)->create([
            'name' => 'FC Barcelona',
            'founded_by' => 'Christopher Bartomeu',
            'country' => 'Spain',
            'city' => 'Barcelona',
            'tournament_points' => 870
        ]);

        factory(Club::class)->create([
            'name' => 'Real Madrid',
            'founded_by' => 'Wilhelm Perez',
            'country' => 'Spain',
            'city' => 'Madrid',
            'tournament_points' => 540
        ]);

        factory(Club::class, 100)->create();
    }
}
