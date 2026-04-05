<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Exception;

class TaskController extends Controller
{
    public function index()
    {
		$tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

	public function new() 
	{
		return view('tasks.new');
	}

	public function create(CreateTaskRequest $request)
    {
        $created = Task::create($request->all());
		if ($created) {
        	return redirect()
				->route(
					'web.tasks.index', 
					[
						"method" => "create",
						"success" => true
					], 
					201
				);
		}
		else {
			return redirect()
				->route(
					'web.tasks.index', 
					[
						"method" => "create",
						"success" => false
					], 
					500
				);
		}
    }

	public function update(UpdateTaskRequest $request) 
	{
		try {
			$updated = Task::where('id', $request->input('id'))
				->updateOrFail($request->all());
			return redirect()
				->route(
					'web.tasks.index', 
					[
						"method" => "update",
						"success" => $updated
					], 
					200
			);
		}
		catch (Exception $e) {
			return redirect()
				->route(
					'web.tasks.index', 
					[
						"method" => "update",
						"success" => false,
						"error" => $e->getMessage()
					], 
					500
				);
		}

	}
}