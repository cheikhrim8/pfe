<?php

use App\ReplyDiscussionComment;
use Illuminate\Database\Seeder;

class ReplyDiscussionCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        ReplyDiscussionComment::truncate();
        /*$content1 = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consectetur doloribus fuga magni veniam voluptates? Aliquam amet atque sit tempora.';
        $content2 = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consectetur doloribus fuga magni veniam voluptates? Aliquam amet atque sit tempora.';
        $content3 = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consectetur doloribus fuga magni veniam voluptates? Aliquam amet atque sit tempora.';
        $content4 = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consectetur doloribus fuga magni veniam voluptates? Aliquam amet atque sit tempora.';
        $content5 = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consectetur doloribus fuga magni veniam voluptates? Aliquam amet atque sit tempora.';

        ReplyDiscussionComment::create(['content' => $content1, 'user_id' => 1, 'discussion_comment_id'=> 1]);
        ReplyDiscussionComment::create(['content' => $content2, 'user_id' => 2, 'discussion_comment_id'=> 3]);
        ReplyDiscussionComment::create(['content' => $content3, 'user_id' => 1, 'discussion_comment_id'=> 1]);
        ReplyDiscussionComment::create(['content' => $content4, 'user_id' => 3, 'discussion_comment_id'=> 2]);
        ReplyDiscussionComment::create(['content' => $content5, 'user_id' => 3, 'discussion_comment_id'=> 2]);*/
    }
}
