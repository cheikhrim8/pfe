<?php

namespace App\View\Components;

use Illuminate\View\Component;

class sideBar extends Component
{
    public $title;

    /**
     * sideBar constructor.
     * @param $title
     */
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.side-bar',[
            'list' => $this->list(),
        ]);
    }

    public function list(){
        return [
            'id',
            'name',
            'hello'
        ];
    }
}
