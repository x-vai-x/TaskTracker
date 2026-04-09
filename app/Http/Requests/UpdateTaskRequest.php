<?php

namespace App\Http\Requests;


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
