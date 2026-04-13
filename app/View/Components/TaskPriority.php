<?php

namespace App\View\Components;

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
			default:
				$this->alertType = "secondary";
		}
    }

    public function render()
    {
        return view('components.alert');
    }
}
