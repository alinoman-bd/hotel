<?php

use Illuminate\Database\Seeder;

class SeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seas = json_decode(file_get_contents(__DIR__. "\..\Data\Seas.json"));
       foreach ($seas->sea as  $sea) {
          App\Sea::create([
              'name' => $sea,
          ]);
       }
    }
}
