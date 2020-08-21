<?php

use App\Reply;
use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Reply::truncate();
        /*$content1 = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consectetur doloribus fuga magni veniam voluptates? Aliquam amet atque sit tempora.';
        $content2 = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consectetur doloribus fuga magni veniam voluptates? Aliquam amet atque sit tempora.';
        $content3 = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consectetur doloribus fuga magni veniam voluptates? Aliquam amet atque sit tempora.';
        $content4 = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consectetur doloribus fuga magni veniam voluptates? Aliquam amet atque sit tempora.';
        $content5 = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consectetur doloribus fuga magni veniam voluptates? Aliquam amet atque sit tempora.';

        Reply::create(['content' => $content1, 'user_id' => 1, 'comment_id'=> 1]);
        Reply::create(['content' => $content2, 'user_id' => 2, 'comment_id'=> 3]);
        Reply::create(['content' => $content3, 'user_id' => 1, 'comment_id'=> 1]);
        Reply::create(['content' => $content4, 'user_id' => 3, 'comment_id'=> 2]);
        Reply::create(['content' => $content5, 'user_id' => 3, 'comment_id'=> 2]);*/
    }
}
