<?php

use App\Video;
use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title1 = 'Introduction';
        $title2 = 'Get start';
        $title3 = 'Install software';
        $title4 = 'Print the hello world';
        $title5 = 'Data Type';

        Video::create(['title' => $title1, 'description' => $title1, 'category_id' => 1, 'path' => 'storage/introduction.mp4', 'playlist_id' => 1]);
        Video::create(['title' => $title2, 'description' => $title2, 'category_id' => 1, 'path' => 'storage/get start.mp4', 'playlist_id' => 1]);
        Video::create(['title' => $title3, 'description' => $title3, 'category_id' => 2, 'path' => '', 'playlist_id' => 1]);
        Video::create(['title' => $title4, 'description' => $title4, 'category_id' => 1, 'path' => '', 'playlist_id' => 1]);
        Video::create(['title' => $title5, 'description' => $title5, 'category_id' => 1, 'path' => '', 'playlist_id' => 2]);


    }
}
