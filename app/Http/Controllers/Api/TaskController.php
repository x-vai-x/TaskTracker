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
			return response()->json(['success' => 1, 'message' => 'Task updated.']);
		}
		catch (Exception $e) {
			return response()->json(['success' => 0, 'message' => 'Task could not be updated.']);
		}
    }
}
