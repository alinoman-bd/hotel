<?php

use Illuminate\Database\Seeder;


class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = json_decode(file_get_contents(__DIR__. "\..\Data\Cities.json"));
       foreach ($cities->city as  $city) {
          App\City::create([
              'name' => $city,
          ]);
       }
    }
}
