<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchBtn extends Component
{
	public string $type;
    
    public function __construct(?string $type = 'submit')
    {
        $this->type = $type;
    }

   
    public function render(): View|Closure|string
    {
        return view('components.search-btn');
    }
}
