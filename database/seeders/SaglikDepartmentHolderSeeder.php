<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SaglikDepartmentHolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department_holders')->insert([
            'id' => 3,
            'institute_id' => 3,
            'name' => 'Genel'
        ]);

        DB::table('department_holders')->insert([
            'id' => 4,
            'institute_id' => 3,
            'name' => 'Tıp Programı'
        ]);

        DB::table('department_holders')->insert([
            'id' => 5,
            'institute_id' => 3,
            'name' => 'Veteriner Programı'
        ]);

        DB::table('department_holders')->insert([
            'id' => 6,
            'institute_id' => 3,
            'name' => 'Beden Eğitimi ve Spor Programı'
        ]);

        DB::table('department_holders')->insert([
            'id' => 7,
            'institute_id' => 3,
            'name' => 'Hemşirelik Programı'
        ]);
    }
}
