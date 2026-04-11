<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\View\Components\TaskPriority;
use App\View\Components\TaskStatus;
use Illuminate\Foundation\Http\FormRequest;

class PartialController extends Controller
{
	public function alert(string $alertType, FormRequest $request) {
		$message = $request->query('message');
    	return view('partials.alert', compact('alertType', 'message'));
	}

	public function priority(string $priority) {
		$taskPriority = new TaskPriority($priority);
		$alertType = $taskPriority->alertType;
		return view('partials.task-priority', compact('priority', 'alertType'));
	}

	public function status(string $status) {
		$taskStatus = new TaskStatus($status);
		$alertType = $taskStatus->alertType;
		return view('partials.task-status', compact('status', 'alertType'));
	}
}