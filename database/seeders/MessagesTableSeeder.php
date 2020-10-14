<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            'user_id' => 1,
            'name' => 'test',
            'message' => 'こんにちは',
            'created_at' => '2020/10/14 11:35:00'
        ]);
    }
}
