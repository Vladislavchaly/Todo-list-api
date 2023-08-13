<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'parent_id' => 'nullable|exists:tasks,id',
            'user_id' => 'required|exists:users,id',
            'priority' => 'required|integer|min:1|max:5',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|in:todo,done',
            'completed_at' => 'nullable|date',
        ];
    }
}