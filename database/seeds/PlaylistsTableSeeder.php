<?php

use App\Playlist;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PlaylistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Playlist::truncate();

        $title1 = 'learn laravel from scratch';
        $title2 = 'build real javaScript projects';
        $title3 = 'Become a master web developer';
        $title4 = 'learn french language beginner';

        $requirement1 = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequatur facilis illum incidunt nobis numquam odio placeat quidem saepe?';
        $requirement2 = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequatur facilis illum incidunt nobis numquam odio placeat quidem saepe?';
        $requirement3 = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequatur facilis illum incidunt nobis numquam odio placeat quidem saepe?';
        $requirement4 = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequatur facilis illum incidunt nobis numquam odio placeat quidem saepe?';

        $description1 = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequatur facilis illum incidunt nobis numquam odio placeat quidem saepe?';
        $description2 = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequatur facilis illum incidunt nobis numquam odio placeat quidem saepe?';
        $description3 = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequatur facilis illum incidunt nobis numquam odio placeat quidem saepe?';
        $description4 = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequatur facilis illum incidunt nobis numquam odio placeat quidem saepe?';

        Playlist::create([
            'title' => $title1,
            'description' => $description1,
            'channel_id' => 1,
            'requirement' => $requirement1,
            'category_id' => 1,
            'slug' => Str::slug($title1, '-')
        ]);
        Playlist::create([
            'title' => $title2,
            'description' => $description2,
            'category_id' => 1,
            'channel_id' => 1,
            'requirement' => $requirement2,
            'slug' => Str::slug($title2, '-')
        ]);
        Playlist::create([
            'title' => $title4,
            'description' => $description4,
            'channel_id' => 2,
            'category_id' => 2,
            'requirement' => $requirement4,
            'slug' => Str::slug($title4, '-')
        ]);
        Playlist::create([
            'title' => $title3,
            'description' => $description3,
            'channel_id' => 2,
            'category_id' => 2,
            'requirement' => $requirement3,
            'slug' => Str::slug($title3, '-')
        ]);
    }
}
