<?php

namespace App\Http\Requests;


use App\Http\Requests\CreateTaskRequest;

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
