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
            'image' => '',
            'date_time' => '10/11(Sun) 11:35 AM'
        ]);
    }
}
