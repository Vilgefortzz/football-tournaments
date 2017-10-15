<?php

use App\FootballPosition;
use Illuminate\Database\Seeder;

class FootballPositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Create football positions
         */
        factory(FootballPosition::class)->create([
            'name' => 'GK',
        ]);

        factory(FootballPosition::class)->create([
            'name' => 'LB',
        ]);

        factory(FootballPosition::class)->create([
            'name' => 'CB',
        ]);

        factory(FootballPosition::class)->create([
            'name' => 'RB',
        ]);

        factory(FootballPosition::class)->create([
            'name' => 'LWB',
        ]);

        factory(FootballPosition::class)->create([
            'name' => 'RWB',
        ]);

        factory(FootballPosition::class)->create([
            'name' => 'DM',
        ]);

        factory(FootballPosition::class)->create([
            'name' => 'LM',
        ]);

        factory(FootballPosition::class)->create([
            'name' => 'CM',
        ]);

        factory(FootballPosition::class)->create([
            'name' => 'RM',
        ]);

        factory(FootballPosition::class)->create([
            'name' => 'AM',
        ]);

        factory(FootballPosition::class)->create([
            'name' => 'LW',
        ]);

        factory(FootballPosition::class)->create([
            'name' => 'SS',
        ]);

        factory(FootballPosition::class)->create([
            'name' => 'RW',
        ]);

        factory(FootballPosition::class)->create([
            'name' => 'CF',
        ]);
    }
}
