<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FenDepartmentHolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department_holders')->insert([
            'id' => 1,
            'institute_id' => 1,
            'name' => 'Genel'
        ]);
    }
}
