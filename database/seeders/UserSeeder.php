<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Victor Ibarra Olivares',
            'email' => 'victor.ibarra.olivares@gmail.com',
            'password' => bcrypt('123456789'),
        ]);

        // $user->roles()->attach();
        $user->assignRole('Admin');

        User::factory(99)->create();
    }
}
