<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Blog;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Blog::truncate();

        User::factory()->create();

        $frontend=Category::create([
            'name'=>'frontend',
            'slug'=>'frontend'
        ]);
        $backend=Category::create([
            'name'=>'backend',
            'slug'=>'backend'
        ]);

        Blog::create([
            'title'=>'Frontend Post',
            'slug'=>'frontend-blog',
            'intro'=>'This is intro',
            'body'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'category_id'=>$frontend->id
        ]);
        Blog::create([
            'title'=>'backend Post',
            'slug'=>'backend-blog',
            'intro'=>'This is intro',
            'body'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'category_id'=>$backend->id
        ]);
    }
}
