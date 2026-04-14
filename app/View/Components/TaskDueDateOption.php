<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TaskDueDateOption extends Component
{
	public string $alertType;
    public function __construct(string $option)
    {
        switch ($option) {
			case "DUE TODAY":
				$this->alertType = "warning";
				break;
			case "OVERDUE":
				$this->alertType = "danger";
				break;
		}
    }

    public function render(): View|Closure|string
    {
		return view('components.alert');
    }
}
