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
		$tasks = Task::with('user')->get();
		$success = $request->query('success', -1);
		$message = $request->query('message');
        return view('tasks.index', compact('tasks', 'success', 'message'));
    }

	public function new() 
	{
		$users = User::all();
		return view('tasks.new', compact('users'));
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

	private function redirectToIndex(bool $success, string $message, int $statusCode = 0) {
		$routeName = "web.tasks.index";
		return parent::redirectRequest($success, $message, $statusCode, $routeName);
	}
}