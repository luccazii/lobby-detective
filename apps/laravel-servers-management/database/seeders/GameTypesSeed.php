<?php

namespace Database\Seeders;

use App\Models\GameType;
use App\Models\User;
use Illuminate\Database\Seeder;

class GameTypesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GameType::create([
            'title' => 'CS:GO',
            'code' => 'csgo',
        ]);
    }
}
