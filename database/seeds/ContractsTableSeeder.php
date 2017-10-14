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
            'club_id' => 1,
            'user_id' => 2,
        ]);

        factory(Contract::class)->create([
            'duration' => '2 weeks',
            'club_id' => 2,
            'user_id' => 2,
        ]);

        factory(Contract::class)->create([
            'duration' => '1 month',
            'club_id' => 3,
            'user_id' => 2,
        ]);
    }
}
