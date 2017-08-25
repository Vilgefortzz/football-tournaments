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
        ]);

        /*
         * Create club president for test
         */
        factory(User::class)->create([
            'username' => 'president',
            'password' => bcrypt('president'),
            'role_id' => Role::ClubPresident
        ]);

        /*
         * Create organizer for test
         */
        factory(User::class)->create([
            'username' => 'organizer',
            'password' => bcrypt('organizer'),
            'role_id' => Role::Organizer
        ]);


        factory(User::class, 10)->create();
    }
}
