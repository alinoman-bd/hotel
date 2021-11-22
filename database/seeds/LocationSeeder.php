<?php

use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = collect(json_decode(file_get_contents(__DIR__. "\..\Data\Locations.json")))->toArray();
        $cities = App\City::all();
        foreach ($cities as  $city) {
            foreach($locations[$city->name] as $location){
                $city->locations()->create([
                    'name' => $location
                ]); 
            }
        }
    }
}
