<?php

use Illuminate\Database\Seeder;
use App\Facility;
class FacilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $facilities = json_decode(file_get_contents(__DIR__. "\..\Data\Facilities.json"));
       foreach ($facilities->facility as  $fac) {
          App\Facility::create([
              'name' => $fac,
          ]);
       }
    }
}
