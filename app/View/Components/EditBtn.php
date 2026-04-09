<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditBtn extends Component
{
	public string $id;
   
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function render(): View|Closure|string
    {
        return view('components.edit-btn');
    }
}
