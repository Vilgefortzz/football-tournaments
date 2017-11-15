<?php

use App\Tournament;
use Illuminate\Database\Seeder;

class TournamentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $startDate1 = date('Y-m-d');
        $endDate1 = date_format(date_create(date('Y-m-d', strtotime($startDate1. ' +7days'))), 'Y-m-d');
        $endDate2 = date_format(date_create(date('Y-m-d', strtotime($endDate1. ' +7days'))), 'Y-m-d');
        $endDate3 = date_format(date_create(date('Y-m-d', strtotime($endDate2. ' +7days'))), 'Y-m-d');
        $endDate4 = date_format(date_create(date('Y-m-d', strtotime($endDate3. ' +7days'))), 'Y-m-d');
        $endDate5 = date_format(date_create(date('Y-m-d', strtotime($endDate4. ' +7days'))), 'Y-m-d');

        /*
         * Create tournaments for test
         */
        factory(Tournament::class)->create([
            'name' => 'Houston Masters Tournament',
            'start_date' => $startDate1,
            'end_date' => $endDate1,
            'country' => 'USA',
            'city' => 'Houston',
            'tournament_points' => 400,
            'number_of_seats' => '32',
            'number_of_available_seats' => 32,
            'game_system' => 'single elimination',
        ]);

        factory(Tournament::class)->create([
            'name' => 'London Masters Tournament',
            'start_date' => $endDate1,
            'end_date' => $endDate2,
            'country' => 'Great Britain',
            'city' => 'London',
            'tournament_points' => 150,
            'number_of_seats' => '4',
            'number_of_available_seats' => 4,
            'game_system' => 'single elimination',
            'user_id' => 5
        ]);

        factory(Tournament::class)->create([
            'name' => 'Paris Masters Tournament',
            'start_date' => $endDate2,
            'end_date' => $endDate3,
            'country' => 'France',
            'city' => 'Paris',
            'tournament_points' => 320,
            'number_of_seats' => '2',
            'number_of_available_seats' => 2,
            'game_system' => 'single elimination',
        ]);

        factory(Tournament::class)->create([
            'name' => 'Tokio Masters Tournament',
            'start_date' => $endDate3,
            'end_date' => $endDate4,
            'country' => 'Japan',
            'city' => 'Tokio',
            'tournament_points' => 680,
            'number_of_seats' => '16',
            'number_of_available_seats' => 16,
            'game_system' => 'everyone with each other',
        ]);

        factory(Tournament::class)->create([
            'name' => 'Wien Masters Tournament',
            'start_date' => $endDate4,
            'end_date' => $endDate5,
            'country' => 'Austria',
            'city' => 'Wien',
            'tournament_points' => 270,
            'number_of_seats' => '8',
            'number_of_available_seats' => 8,
            'game_system' => 'everyone with each other',
            'user_id' => 6
        ]);

        factory(Tournament::class, 40)->create();
    }
}
