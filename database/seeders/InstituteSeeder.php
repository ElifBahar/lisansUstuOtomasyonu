<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InstituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('institutes')->insert([
            'id' => 1,
            'institute' => 'Fen Bilimleri Enstitüsü',
        ]);

        DB::table('institutes')->insert([
            'id' => 2,
            'institute' => 'Sosyal Bilimler Enstitüsü',
        ]);

        DB::table('institutes')->insert([
            'id' => 3,
            'institute' => 'Sağlık Bilimleri Enstitüsü',
        ]);

        DB::table('institutes')->insert([
            'id' => 4,
            'institute' => 'Eğitim Bilimleri Enstitüsü',
        ]);
    }
}
