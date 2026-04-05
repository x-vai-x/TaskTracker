<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TaskStatus extends Component
{
	public string $alertType = "";
    /**
     * Create a new component instance.
     */
	public function __construct(string $status)
    {
        switch ($status) {
			case "PENDING":
				$this->alertType = "warning";
				break;
			case "NON COMPLIANT":
				$this->alertType = "danger";
				break;
			case "COMPLETED":
				$this->alertType = "success";
				break;
		}
    }

    public function render()
    {
        return view('components.alert');
    }
}
