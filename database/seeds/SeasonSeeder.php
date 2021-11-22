<?php

use Illuminate\Database\Seeder;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seasons = json_decode(file_get_contents(__DIR__. "\..\Data\Seasons.json"));
        foreach ($seasons->season as  $season) {
           App\Season::create([
               'name' => $season,
           ]);
        }
        
    }
}
