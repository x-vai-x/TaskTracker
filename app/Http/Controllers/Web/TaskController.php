<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Exception;

class TaskController extends Controller
{
    public function index()
    {
		$tasks = Task::all();
        return view('tasks.list', compact('tasks'));
    }

	public function update(UpdateTaskRequest $request) 
	{
		try {
			$updated = Task::where('id', $request->input('id'))
				->updateOrFail($request->all());
			return redirect()
				->route(
					'web.tasks.index', 
					["updateSuccess" => $updated], 
					200
			);
		}
		catch (Exception $e) {
			return redirect()
				->route(
					'web.tasks.index', 
					[
						"updateSuccess" => false,
						"updateError" => $e->getMessage()
					], 
					500
				);
		}

	}
}