<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Testes',
            'email' => 'luccazii108@gmail.com',
            'password' => bcrypt('123secret'),
        ]);
    }
}
