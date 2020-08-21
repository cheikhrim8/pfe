<?php

use App\DiscussionComment;
use Illuminate\Database\Seeder;

class DiscussionCommentSeeder extends Seeder
{

    public function run()
    {

        DiscussionComment::truncate();
        $content1 = ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias, hic possimus quidem quod temporibus vel. Aperiam dolore modi praesentium.';
        $content2 = ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias, hic possimus quidem quod temporibus vel. Aperiam dolore modi praesentium.';
        $content3 = ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias, hic possimus quidem quod temporibus vel. Aperiam dolore modi praesentium.';
        $content4 = ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias, hic possimus quidem quod temporibus vel. Aperiam dolore modi praesentium.';
        $content5 = ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias, hic possimus quidem quod temporibus vel. Aperiam dolore modi praesentium.';
        $content6 = ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias, hic possimus quidem quod temporibus vel. Aperiam dolore modi praesentium.';
        $content7 = ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias, hic possimus quidem quod temporibus vel. Aperiam dolore modi praesentium.';

        DiscussionComment::create(['user_id' => 4, 'discussion_id' => 2, 'content' => $content1]);
        DiscussionComment::create(['user_id' => 1, 'discussion_id' => 1, 'content' => $content2]);
        DiscussionComment::create(['user_id' => 3, 'discussion_id' => 2, 'content' => $content3]);
        DiscussionComment::create(['user_id' => 3, 'discussion_id' => 1, 'content' => $content4]);
        DiscussionComment::create(['user_id' => 2, 'discussion_id' => 3, 'content' => $content6]);
        DiscussionComment::create(['user_id' => 5, 'discussion_id' => 3, 'content' => $content5]);
        DiscussionComment::create(['user_id' => 4, 'discussion_id' => 2, 'content' => $content7]);
    }

}
