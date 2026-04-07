<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Exception;

class TaskController extends Controller
{
    public function index()
    {
        return response()->json(Task::all());
    }

    public function update(UpdateTaskRequest $request)
    {
		try {
			Task::where('id', $request->input('id'))
				->updateOrFail($request->all());
			return $this->redirectToIndex(1, 'Task updated.', 201);
		}
		catch (Exception $e) {
			return $this->redirectToIndex(0, 'Task could not be updated.');
		}
    }
	private function redirectToIndex(bool $success, string $message, int $statusCode = 0) {
		$routeName = "api.tasks.index";
		return parent::redirectRequest($success, $message, $statusCode, $routeName);
	}
}
