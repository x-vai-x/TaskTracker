<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Exception;

class TaskController extends Controller
{
    public function update(UpdateTaskRequest $request)
    {
		try {
			$task = Task::where('id', $request->input('id'))
				->firstOrFail();
			$success = $task->updateOrFail($request->all());
			
			return response()->json(['success' => $success]);
		}
		catch (Exception $e) {
			return response()->json(['success' => 0]);
		}
    }
}
