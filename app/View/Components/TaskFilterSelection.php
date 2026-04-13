<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Helpers\UserHelper;

class TaskFilterSelection extends Component
{
	public array $statuses = ['PENDING', 'COMPLETED', 'NON COMPLIANT'];

	public array $dueDates = ['OVERDUE' => 'danger', 'DUE TODAY' => 'warning'];

	public array $users;

    public function __construct()
    {
        $this->users = UserHelper::formatUsers();
    }

    public function render(): View|Closure|string
    {
        return view('components.task-filter-selection');
    }
}
