<?php

namespace Database\Seeders;

use App\Models\People;
use App\Models\PeopleDependents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $peoples = People::factory(1000)->create();

        foreach ($peoples as $index => $people) {
            PeopleDependents::factory(4)->create([
                'people_id' => $people->id
            ]);
        }
    }
}
