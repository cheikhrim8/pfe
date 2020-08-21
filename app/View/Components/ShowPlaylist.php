<?php

namespace App\View\Components;

use App\Video;
use Illuminate\View\Component;

class ShowPlaylist extends Component
{
    public $id;

    /**
     * Create a new component instance.
     *
     * @param $id
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.show-playlist',[
            'videos' => $this->list(),
        ]);
    }

    public function list(){
        return Video::all();
    }

}
