<?php

use Illuminate\Database\Seeder;

class RiverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rivers = collect(json_decode(file_get_contents(__DIR__. "\..\Data\Rivers.json")))->toArray();
        $locations = App\Location::all();
        foreach ($locations as  $location) {
            foreach($rivers[$location->name] as $river){
                $location->rivers()->create([
                    'name' => $river
                ]);
            }
        }
    }
}
