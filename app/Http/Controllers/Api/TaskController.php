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
			$updatedRows = Task::where('id', $request->input('id'))
				->firstOrFail()
				->update($request->validated());
			$success = $updatedRows === 1 ? 1 : 0;
			
			return response()->json(['success' => $success]);
		}
		catch (Exception $e) {
			return response()->json(['success' => 0]);
		}
    }
}
