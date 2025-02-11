<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class popup extends Component
{
    /**
     * Create a new component instance.
     */
    public $reminders;

    public function __construct($reminders)
    {
        $this->reminders = $reminders;
    }

    public function render()
    {
        return view('components.popup');
    }
}
