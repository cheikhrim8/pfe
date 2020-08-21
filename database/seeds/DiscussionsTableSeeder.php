<?php

use App\Discussion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Discussion::truncate();

        $title1 = 'Implementing OAUTH2 with laravel passport';
        $title2 = 'Pagination in VueJs not working correctly';
        $title3 = 'VueJs event listeners for child components';
        $title4 = 'laravel homestead error - undetected database';
        $title5 = 'Debugging error while using the class "active"';

        $content1 = 'Prefer to get a copy and use Font Awesome alongside your own project’s source code while building locally and serving in production? Downloading and hosting Font Awesome yourself is great for when you have many sites or apps in one codebase or want to customize parts of Font Awesome for your workflow';
        $content2 = 'Prefer to get a copy and use Font Awesome alongside your own project’s source code while building locally and serving in production? Downloading and hosting Font Awesome yourself is great for when you have many sites or apps in one codebase or want to customize parts of Font Awesome for your workflow';
        $content3 = 'Prefer to get a copy and use Font Awesome alongside your own project’s source code while building locally and serving in production? Downloading and hosting Font Awesome yourself is great for when you have many sites or apps in one codebase or want to customize parts of Font Awesome for your workflow';
        $content4 = 'Prefer to get a copy and use Font Awesome alongside your own project’s source code while building locally and serving in production? Downloading and hosting Font Awesome yourself is great for when you have many sites or apps in one codebase or want to customize parts of Font Awesome for your workflow';
        $content5 = 'Prefer to get a copy and use Font Awesome alongside your own project’s source code while building locally and serving in production? Downloading and hosting Font Awesome yourself is great for when you have many sites or apps in one codebase or want to customize parts of Font Awesome for your workflow';

        $discussion1 = ['title' => $title1, 'content' => $content1, 'user_id' => 1,'slug' => Str::slug($title1,'-')];
        $discussion2 = ['title' => $title2, 'content' => $content2, 'user_id' => 1, 'slug' => Str::slug($title2,'-')];
        $discussion3 = ['title' => $title3, 'content' => $content3, 'user_id' => 3,  'slug' => Str::slug($title3,'-')];
        $discussion4 = ['title' => $title4, 'content' => $content4, 'user_id' => 2,  'slug' => Str::slug($title4,'-')];
        $discussion5 = ['title' => $title5, 'content' => $content5, 'user_id' => 3,  'slug' => Str::slug($title5,'-')];

        Discussion::create($discussion1);
        Discussion::create($discussion2);
        Discussion::create($discussion3);
        Discussion::create($discussion4);
        Discussion::create($discussion5);
    }
}
