<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Date;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
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
		$this->users = User::all()
			->mapWithKeys(function (User $user) {
				return [$user->id => $user->name . ' (' . $user->email . ')'];
			})
			->toArray();
	   	$this->task = $task;
   }


    public function render(): View|Closure|string
    {
        return view('components.task-form');
    }
}
