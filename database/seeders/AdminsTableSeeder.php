<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'id'                => '1',
            'name'              => 'アドミンテスト',
            'administrator_id'  => '123456789',
            'password'          => Hash::make('password'),
            'last_logged_at'    => NULL,
        ]);
    }
}
