<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Exception;

class TaskController extends Controller
{
    public function index($success = -1, $message = "")
    {
		$tasks = Task::all();
        return view('tasks.index', compact('tasks', 'success', 'message'));
    }

	public function new() 
	{
		return view('tasks.new');
	}

	public function create(CreateTaskRequest $request)
    {
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

	public function update(UpdateTaskRequest $request) 
	{
		try {
			Task::where('id', $request->input('id'))
				->updateOrFail($request->all());
				return $this->redirectToIndex(
					1, 
					"Task updated."
				);
		}
		catch (Exception $e) {
			return $this->redirectToIndex(
				0, 
				"Task could not be updated."
			);
		}

	}

	private function redirectToIndex(bool $success, string $message, int $statusCode = 0) {
		$routeName = "web.tasks.index";
		return parent::redirectRequest($success, $message, $statusCode, $routeName);
	}
}