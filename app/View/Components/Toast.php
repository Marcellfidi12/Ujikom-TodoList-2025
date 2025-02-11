<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Toast extends Component
{
    public $message;
    public $visible;

    /**
     * Create a new component instance.
     */
    public function __construct($message = '', $visible = false)
    {
        $this->message = $message;
        $this->visible = $visible;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.toast');
    }
}
