<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public string $alertType;

    public function __construct(string $alertType = 'info')
    {
        $this->alertType = $alertType;
    }

    public function render()
    {
        return view('components.alert');
    }
}