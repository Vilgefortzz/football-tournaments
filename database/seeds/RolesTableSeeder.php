<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*
         * Create role - Footballer
         */
        factory(Role::class)->create([
            'name' => 'Footballer'
        ]);

        /*
         * Create role - Club President
         */
        factory(Role::class)->create([
            'name' => 'Club President'
        ]);

        /*
         * Create role - Organizer
         */
        factory(Role::class)->create([
            'name' => 'Organizer'
        ]);

        /*
         * Create role - Admin
         */
        factory(Role::class)->create([
            'name' => 'Admin'
        ]);
    }
}
