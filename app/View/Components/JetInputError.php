<?php

namespace App\View\Components;

use Illuminate\View\Component;

class JetInputError extends Component
{
    public $for;

    public function __construct($for)
    {
        $this->for = $for;
    }

    public function render()
    {
        return view('components.jet-input-error');
    }
}