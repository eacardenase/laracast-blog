<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family',
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My Family Post',
            'slug' => 'my-family-post',
            'excerpt' => 'Amet veniam eu exercitation enim id amet qui sunt proident.',
            'body' => '<p>Ad amet eu tempor tempor laboris occaecat minim culpa minim proident ut esse esse et. Magna excepteur fugiat velit non cillum do nulla. Sit labore ad nostrud veniam sit dolore deserunt ea commodo culpa.</p>',
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'title' => 'My Personal Post',
            'slug' => 'my-personal-post',
            'excerpt' => 'Tempor sit ullamco ullamco et exercitation aliquip qui voluptate laboris elit cupidatat adipisicing.',
            'body' => '<p>Commodo quis aliqua aliquip exercitation amet quis. Sit veniam adipisicing do in non et enim. Proident do sunt minim laborum commodo nisi aliqua ad aliquip. Ipsum aliqua incididunt cupidatat id. Nulla tempor aliqua reprehenderit sint adipisicing deserunt enim et ex tempor in officia. Voluptate eiusmod quis ea nostrud elit commodo labore consectetur qui esse sit eu. Tempor occaecat amet proident sunt laboris deserunt et velit aliqua ad.</p>',
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => 'Voluptate eu ad aliquip voluptate consectetur nulla.',
            'body' => '<p>Ut enim enim mollit exercitation nulla sunt enim laboris aliquip cillum laborum proident veniam. Amet nostrud commodo qui voluptate. Quis dolor sunt occaecat esse aute do dolore.</p>',
        ]);
    }
}
