<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModelUsers;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       ModelUsers::create([
            'username' => 'superadmin',
            'level' => 'admin',
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
        ]);

    }
}
