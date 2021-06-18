<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
            'Anime',
            'Manga',
        ];
        $number_of_cities = count($name);
        for($i = 0; $i<count($name); $i++){
            Category::create([
                'name' => $name[$i],
            ]);
        }
    }
}
