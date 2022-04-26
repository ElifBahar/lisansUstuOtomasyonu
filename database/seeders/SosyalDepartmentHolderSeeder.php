<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SosyalDepartmentHolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department_holders')->insert([
            'id' => 2,
            'institute_id' => 2,
            'name' => 'Genel'
        ]);
    }
}
