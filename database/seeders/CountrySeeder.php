<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_decode(file_get_contents('https://raw.githubusercontent.com/umpirsky/country-list/master/data/en_US/country.json'), true);

        foreach ($data as $item) {
            Country::create([
                'name' => $item
            ]);
        }
    }
}
