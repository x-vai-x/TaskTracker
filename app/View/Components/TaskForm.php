<?php

namespace App\View\Components;

use App\Helpers\UserHelper;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TaskForm extends Component
{
	public string $routeName;

	public string $routeMethod;

	public array $users;

	public $task;

   public function __construct(string $routeName, string $routeMethod, $task = null)
   {
		$this->routeName = $routeName;
		$this->routeMethod = $routeMethod;
		$this->users = UserHelper::formatUsers();
	   	$this->task = $task;
   }


    public function render(): View|Closure|string
    {
        return view('components.task-form');
    }
}
