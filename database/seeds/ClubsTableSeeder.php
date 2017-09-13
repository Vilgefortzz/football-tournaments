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
        ]);

        factory(Club::class)->create([
            'name' => 'Real Madrid',
            'founded_by' => 'Wilhelm Perez',
        ]);

        factory(Club::class, 10)->create();
    }
}
