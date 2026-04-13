<?php

namespace App\Http\Requests;

use App\Enums\TaskStatus;
use App\Enums\TaskPriority;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreateTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
			'title' => 'required|string|max:255',
            'description' => 'nullable|string',
			'priority' => ['nullable', new Enum(TaskPriority::class)],
			'status' => ['nullable', new Enum(TaskStatus::class)],
            'due_date' => 'nullable|date',
			'corrective_action_note' => 'required_if:status,NON COMPLIANT|nullable|string',
			'user_id' => 'nullable||integer'
        ];
    }
}
