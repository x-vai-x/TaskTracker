<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TaskForm extends Component
{
	public string $title;
	public string $description;
	public string $status;
	public string $priority;
	public string $method;

	/** 
	* @param string $title
	* @param string $description
	* @param string $status
	* @param string $priority
	* @param string $method
	*/
   public function __construct(string $method="create", string $title = "", string $description = "", string $status = "", string $priority = "")
   {
	   $this->title = $title;
	   $this->description = $description;
	   $this->status = $status;
	   $this->priority = $priority;
	   $this->method = $method;
   }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.task-form');
    }
}
