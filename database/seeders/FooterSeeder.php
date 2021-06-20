<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('footers')->insert([
            'title' => "AniBLog",
            'image' => '../images/logo.svg',
            'copyright' => 'Copyright ©2021 All rights reserved | This template is made with <3 by Makogai',
            // 'category_id' => 1
        ]);
    }
}
