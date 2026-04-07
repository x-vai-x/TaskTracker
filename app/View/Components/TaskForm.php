<?php

namespace App\View\Components;

use Closure;
use Date;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TaskForm extends Component
{
	public $task;
	public string $routeName;

	public string $routeMethod;

   public function __construct(string $routeName, string $routeMethod, $task = null)
   {
		$this->routeName = $routeName;
		$this->routeMethod = $routeMethod;
	   	$this->task = $task;
   }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.task-form');
    }
}
