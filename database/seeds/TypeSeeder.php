<?php

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = json_decode(file_get_contents(__DIR__. "\..\Data\Types.json"));
       foreach ($types->type as  $type) {
          App\Type::create([
              'name' => $type,
          ]);
       }
    }
}
