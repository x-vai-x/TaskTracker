<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Exception;
use Illuminate\Foundation\Http\FormRequest;

class TaskController extends Controller
{
    public function index()
    {
        return response()->json(Task::all());
    }

    public function update(UpdateTaskRequest $request)
    {
		try {
			$task = Task::where('id', $request->input('id'))
				->firstOrFail();
			$success = $task->update($request->all());
			
			return response()->json(['success' => $success]);
		}
		catch (Exception $e) {
			return response()->json(['success' => 0]);
		}
    }
}
