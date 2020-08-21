<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $message ='';
    public $type ='';

    public function __construct(string $message, string $type)
    {
        $this->type = $type;
        $this->message = $message;
    }

    public function render()
    {
        return view('components.alert');
    }

}
