<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*
         * Create admin
         */
        factory(User::class)->create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'role_id' => Role::Admin
        ]);

        /*
         * Create footballer for test
         */
        factory(User::class)->create([
            'username' => 'footballer',
            'password' => bcrypt('footballer'),
            'country' => 'Spain',
            'city' => 'Barcelona',
            'main_football_position' => 'RW'
        ]);

        /*
         * Create club president for test
         */
        factory(User::class)->create([
            'username' => 'president',
            'password' => bcrypt('president'),
            'main_football_position' => 'CB',
            'role_id' => Role::ClubPresident
        ]);

        /*
         * Create organizers for test
         */
        factory(User::class)->create([
            'username' => 'organizer',
            'password' => bcrypt('organizer'),
            'role_id' => Role::Organizer
        ]);

        factory(User::class)->create([
            'username' => 'organizer_2',
            'password' => bcrypt('organizer_2'),
            'role_id' => Role::Organizer
        ]);

        factory(User::class)->create([
            'username' => 'organizer_3',
            'password' => bcrypt('organizer_3'),
            'role_id' => Role::Organizer
        ]);

        factory(User::class, 10)->create([
            'main_football_position' => 'GK',
        ]);

        factory(User::class, 30)->create();
    }
}
