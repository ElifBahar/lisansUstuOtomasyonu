<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SosyalDepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('institute_departments')->insert([
            'institute_id' => 2,
            'department_holder_id' => 2,
            'department_name' => 'Tarih'
        ]);

        DB::table('institute_departments')->insert([
            'institute_id' => 2,
            'department_holder_id' => 2,
            'department_name' => 'Türk Dili ve Edebiyatı'
        ]);

        DB::table('institute_departments')->insert([
            'institute_id' => 2,
            'department_holder_id' => 2,
            'department_name' => 'Sosyoloji'
        ]);

        DB::table('institute_departments')->insert([
            'institute_id' => 2,
            'department_holder_id' => 2,
            'department_name' => 'Coğrafya'
        ]);

        DB::table('institute_departments')->insert([
            'institute_id' => 2,
            'department_holder_id' => 2,
            'department_name' => 'Felsefe ve Din Bilimleri'
        ]);

        DB::table('institute_departments')->insert([
            'institute_id' => 2,
            'department_holder_id' => 2,
            'department_name' => 'Temel İslam Bilimleri'
        ]);

        DB::table('institute_departments')->insert([
            'institute_id' => 2,
            'department_holder_id' => 2,
            'department_name' => 'Sağlık Yönetim'
        ]);

        DB::table('institute_departments')->insert([
            'institute_id' => 2,
            'department_holder_id' => 2,
            'department_name' => 'Teknoloji ve Bilgi Yönetimi'
        ]);

        DB::table('institute_departments')->insert([
            'institute_id' => 2,
            'department_holder_id' => 2,
            'department_name' => 'İletişim Bilimleri'
        ]);

        DB::table('institute_departments')->insert([
            'institute_id' => 2,
            'department_holder_id' => 2,
            'department_name' => 'İslam Tarihi ve Sanatları'
        ]);

        DB::table('institute_departments')->insert([
            'institute_id' => 2,
            'department_holder_id' => 2,
            'department_name' => 'Batı Dilleri ve Edebiyatları'
        ]);

        DB::table('institute_departments')->insert([
            'institute_id' => 2,
            'department_holder_id' => 2,
            'department_name' => 'Müzik'
        ]);

        DB::table('institute_departments')->insert([
            'institute_id' => 2,
            'department_holder_id' => 2,
            'department_name' => 'Çağdaş Türk Lehçeleri ve Edebiyatları'
        ]);

        DB::table('institute_departments')->insert([
            'institute_id' => 2,
            'department_holder_id' => 2,
            'department_name' => 'Girişimcilik ve Yenilik Yönetimi 2. Öğretim'
        ]);

        DB::table('institute_departments')->insert([
            'institute_id' => 2,
            'department_holder_id' => 2,
            'department_name' => 'İlköğretim Din Kültürü ve Ahlak Bilgisi Eğitimi'
        ]);

        DB::table('institute_departments')->insert([
            'institute_id' => 2,
            'department_holder_id' => 2,
            'department_name' => 'İşletme'
        ]);

        DB::table('institute_departments')->insert([
            'institute_id' => 2,
            'department_holder_id' => 2,
            'department_name' => 'İktisat'
        ]);

        DB::table('institute_departments')->insert([
            'institute_id' => 2,
            'department_holder_id' => 2,
            'department_name' => 'Kamu Yönetimi'
        ]);

        DB::table('institute_departments')->insert([
            'institute_id' => 2,
            'department_holder_id' => 2,
            'department_name' => 'Maliye'
        ]);
    }
}
