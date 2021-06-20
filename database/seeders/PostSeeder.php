<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => "Test Post",
            'content' => 'ma@re.me',
            'create_user_id' => 1,
            'slug' => Str::slug("Test Post", '-'),
            'short_content' => 'Test Post',
            // 'category_id' => 1
        ]);
        DB::table('posts')->insert([
            'title' => "The best wallpapers for your desktop are here!",
            'content' => 'Get my picks of the best wallpapers for desktop! There are many different types, something for everyone!',
            'create_user_id' => 1,
            'slug' => Str::slug("The best wallpapers for your desktop are here!", '-'),
            'short_content' => 'Get my picks of the best wallpapers for desktop!',
            // 'category_id' => 1
        ]);
        DB::table('posts_categories_relations')->insert([
            'post_id' => 1,
            'create_user_id' => 1,
            'category_id' => 1,
            // 'category_id' => 1
        ]);
        DB::table('posts_categories_relations')->insert([
            'post_id' => 2,
            'create_user_id' => 1,
            'category_id' => 2,
            // 'category_id' => 1
        ]);
    }
}
