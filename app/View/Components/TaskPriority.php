<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TaskPriority extends Component
{
	public string $alertType = "";

    public function __construct(string $priority)
    {
        switch ($priority) {
			case "LOW":
				$this->alertType = "success";
				break;
			case "MEDIUM":
				$this->alertType = "info";
				break;
			case "HIGH":
				$this->alertType = "warning";
				break;
		}
    }

    public function render()
    {
        return view('components.alert');
    }
}
