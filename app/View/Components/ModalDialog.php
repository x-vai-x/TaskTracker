<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalDialog extends Component
{
	public string $id;
	public string $title;
   
    public function __construct(string $id, string $title)
    {
		$this->id = $id;
        $this->title = $title;
    }

    public function render(): View|Closure|string
    {
        return view('components.modal-dialog');
    }
}
