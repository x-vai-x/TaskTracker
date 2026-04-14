<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;
use Exception;

class TaskController extends Controller
{
    public function index(FormRequest $request)
	{
		$user_id = $request->query('user_id');
		$statuses = (array) $request->query('statuses');
		$dueDateOptions = array_map('strtoupper', (array) $request->query('due_date_options'));
		$today = now()->startOfDay();

		$tasks = Task::query()
			->with('user')

			->when(!empty($statuses), function ($q) use ($statuses) {
				$q->whereIn('status', $statuses);
			})

			->when($user_id, function ($q) use ($user_id) {
				$q->where('user_id', $user_id);
			})

			->when(!empty($dueDateOptions), function ($q) use ($dueDateOptions, $today) {

				$q->where(function ($query) use ($dueDateOptions, $today) {

					if (in_array('DUE TODAY', $dueDateOptions)) {
						$query->orWhereDate('due_date', $today);
					}

					if (in_array('OVERDUE', $dueDateOptions)) {
						$query->orWhere(function ($sub) use ($today) {
							$sub->whereNotNull('due_date')
								->whereDate('due_date', '<', $today);
						});
					}
				});
			})
			->get();

		$success = $request->query('success', -1);
		$message = $request->query('message');

		return view('tasks.index', compact('tasks', 'success', 'message'));
	}

	public function new() 
	{
		return view('tasks.new');
	}

	public function create(CreateTaskRequest $request)
    {
		$request = $request->merge([
			'status' => $request->input('status') ?: 'PENDING',
			'priority' => $request->input('priority') ?: null,
		]);

		try {
			Task::create($request->all());
        
			return $this->redirectToIndex(
				1, 
				"Task created.",
				201
			);
		}
		catch (Exception $e) {
			return $this->redirectToIndex(
				0, 
				"Task could not be created"
			);
		}
    }

	private function redirectToIndex(bool $success, string $message, int $statusCode = 0) {
		$routeName = "web.tasks.index";
		return parent::redirectRequest($success, $message, $statusCode, $routeName);
	}
}