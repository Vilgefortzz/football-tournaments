<?php

use App\Contract;
use Illuminate\Database\Seeder;

class ContractsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Create contracts for test - created
         */
        factory(Contract::class)->create([
            'club_name' => 'FC Barcelona',
            'user_name' => 'Josep Bartomeu',
            'club_id' => 1,
            'user_id' => 2,
        ]);

        factory(Contract::class)->create([
            'duration' => '2 weeks',
            'club_name' => 'Real Madrid',
            'user_name' => 'Wilhelm Perez',
            'club_id' => 2,
            'user_id' => 2,
        ]);

        factory(Contract::class)->create([
            'duration' => '1 month',
            'club_name' => 'XYZ',
            'user_name' => 'Someone',
            'club_id' => 3,
            'user_id' => 2,
        ]);
    }
}
