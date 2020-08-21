<?php

use App\Channel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Channel::truncate();

        $title1 = 'Laravel';
        $title2 = 'PHP Testing';
        $title3 = 'Vue Js';
        $title4 = 'JavaScript';
        /*$title5 = 'CSS3';
        $title6 = 'Spark';
        $title7 = 'Lumen';
        $title8 = 'Forge';*/

        $channel1 = ['title' => $title1,'user_id' =>1 , 'slug' => Str::slug($title1,'-')];
        $channel2 = ['title' => $title2,'user_id' =>2 , 'slug' => Str::slug($title2,'-')];
        $channel3 = ['title' => $title3,'user_id' =>3 ,'slug' => Str::slug($title3,'-')];
        $channel4 = ['title' => $title4,'user_id' =>4 , 'slug' => Str::slug($title4,'-')];
        /*$channel5 = ['title' => $title5,'user_id' =>4 , 'slug' => Str::slug($title5,'-')];
        $channel6 = ['title' => $title6,'user_id' =>4 , 'slug' => Str::slug($title6,'-')];
        $channel7 = ['title' => $title7,'user_id' =>2 , 'slug' => Str::slug($title7,'-')];
        $channel8 = ['title' => $title8,'user_id' =>2 , 'slug' => Str::slug($title8,'-')];*/

        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
       /* Channel::create($channel5);
        Channel::create($channel6);
        Channel::create($channel7);
        Channel::create($channel8);*/
    }
}
