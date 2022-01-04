<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use DateTime;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 35; $i++){
            $faker = Faker::create('ja_JP');

            DB::table('patients')->insert([
                'id'                => $i,
                'patient_id'        => $faker->numberBetween(1, 30),
                'name'              => 'テスト'.$i,
                'birthday'          => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 week')->format('Y/m/d'),
                'results'           => $faker->numberBetween(1, 3),
                'results_pdf'       => $i.'.pdf',
                'created_at'        => new DateTime(),
                'updated_at'        => null,
                'deleted_at'        => null,
            ]);
        }
    }
}
