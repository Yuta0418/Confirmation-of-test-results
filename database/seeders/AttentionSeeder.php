<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use DateTime;

class AttentionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attention')->insert([
            'id' => '1',
            'comment' => '陰性証明書の発行を依頼した方のみダウンロードできます。',
            'created_at' => new DateTime(),
            'updated_at'        => null
        ]);
    }
}
