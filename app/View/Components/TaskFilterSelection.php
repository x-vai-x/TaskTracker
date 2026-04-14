<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Helpers\UserHelper;

class TaskFilterSelection extends Component
{
	public array $statuses = ['PENDING', 'COMPLETED', 'NON COMPLIANT'];

	public array $dueDateOptions = ['OVERDUE', 'DUE TODAY'];

	public array $users;

	public array $selectedStatuses;
	 
	public array $selectedDueDateOptions;

	public ?string $selectedUserId;

	public function __construct(array $selectedStatuses, array $selectedDueDateOptions, ?string $selectedUserId)
    {
        $this->users = UserHelper::formatUsers();

		$this->selectedStatuses = $selectedStatuses;
		$this->selectedDueDateOptions = $selectedDueDateOptions;
		$this->selectedUserId = $selectedUserId;
    }

    public function render(): View|Closure|string
    {
        return view('components.task-filter-selection');
    }
}
