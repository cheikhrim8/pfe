<?php

use App\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::truncate();
        $content1 = ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias, hic possimus quidem quod temporibus vel. Aperiam dolore modi praesentium.';
        $content2 = ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias, hic possimus quidem quod temporibus vel. Aperiam dolore modi praesentium.';
        $content3 = ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias, hic possimus quidem quod temporibus vel. Aperiam dolore modi praesentium.';
        $content4 = ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias, hic possimus quidem quod temporibus vel. Aperiam dolore modi praesentium.';
        $content5 = ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias, hic possimus quidem quod temporibus vel. Aperiam dolore modi praesentium.';
        $content6 = ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias, hic possimus quidem quod temporibus vel. Aperiam dolore modi praesentium.';
        $content7 = ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias, hic possimus quidem quod temporibus vel. Aperiam dolore modi praesentium.';
        Comment::create(['user_id' => 4, 'playlist_id' => 2, 'content' => $content1]);
        Comment::create(['user_id' => 1, 'playlist_id' => 1, 'content' => $content2]);
        Comment::create(['user_id' => 3, 'playlist_id' => 2, 'content' => $content3]);
        Comment::create(['user_id' => 3, 'playlist_id' => 1, 'content' => $content4]);
        Comment::create(['user_id' => 2, 'playlist_id' => 3, 'content' => $content6]);
        Comment::create(['user_id' => 1, 'playlist_id' => 3, 'content' => $content5]);
        Comment::create(['user_id' => 4, 'playlist_id' => 2, 'content' => $content7]);
    }
}
