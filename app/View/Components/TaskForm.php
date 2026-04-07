<?php

namespace App\View\Components;

use Closure;
use Date;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TaskForm extends Component
{
	public ?string $title;
	public ?string $description;
	public ?string $status;
	public ?string $priority;

	public ?string $dueDate;
	public ?string $routeName;

	/** 
	* @param string $title
	* @param string $description
	* @param string $status
	* @param string $priority
	* @param string $dueDate
	* @param string $routeName
	*/
   public function __construct(?string $title = "", ?string $description = "", ?string $status = "", ?string $priority = "", ?string $dueDate = null, string $routeName)
   {
	   $this->title = $title;
	   $this->description = $description;
	   $this->status = $status;
	   $this->priority = $priority;
	   $this->dueDate = $dueDate;
	   $this->routeName = $routeName;
   }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.task-form');
    }
}
