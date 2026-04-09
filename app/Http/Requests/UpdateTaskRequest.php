<?php

namespace App\Http\Requests;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use App\Http\Requests\CreateTaskRequest;

>>>>>>> a1a386e (works)
=======
use App\Http\Requests\CreateTaskRequest;

>>>>>>> debug

class UpdateTaskRequest extends CreateTaskRequest
{

    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
			...parent::rules(),
			'id' => 'required|integer|exists:tasks,id'
        ];
    }
}
