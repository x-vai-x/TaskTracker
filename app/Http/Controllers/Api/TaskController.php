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

    public function create(CreateTaskRequest $request)
    {
        $created = Task::create($request->all());
		if ($created) {
        	return redirect()->route('api.tasks.index', [], 201);
		}
		else {
			return redirect()->route('api.tasks.index', [], 500);
		}
    }

    public function update(UpdateTaskRequest $request)
    {
		try {
			$updated = Task::where('id', $request->input('id'))
				->updateOrFail($request->all());
			return redirect()
				->route(
					'api.tasks.index', 
					["updateSuccess" => $updated], 
					200
			);
		}
		catch (Exception $e) {
			return redirect()
				->route(
					'api.tasks.index', 
					[
						"updateSuccess" => false,
						"updateError" => $e->getMessage()
					], 
					500
				);
		}
       

    }
}
