<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

      $this->call(RolesTableSeeder::class);
       $this->call(UsersTableSeeder::class);


        $this->call(ChannelsTableSeeder::class);
        $this->call(RepliesTableSeeder::class);
        $this->call(PlaylistsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
      $this->call(DiscussionsTableSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(DiscussionCommentSeeder::class);
        $this->call(ReplyDiscussionCommentSeeder::class);
    }
}
