<?php

use Illuminate\Database\Seeder;

class LakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lakes = collect(json_decode(file_get_contents(__DIR__. "\..\Data\Lakes.json")))->toArray();
        $locations = App\Location::all();
        foreach ($locations as  $location) {
            foreach($lakes[$location->name] as $lake){
                $location->lakes()->create([
                    'name' => $lake
                ]);
            }
        }
    }
}
