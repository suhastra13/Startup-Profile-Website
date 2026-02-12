<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Ubah jadi true
    }

    public function rules(): array
    {
        return [
            'project_name' => 'required|string|max:255',
            'client_name' => 'nullable|string|max:255',
            'project_type' => 'required|string',
            'status' => 'required|in:pending,in_progress,completed,cancelled',
            'priority' => 'required|in:low,medium,high',
            'price' => 'nullable|numeric',
            'start_date' => 'nullable|date',
            'deadline' => 'nullable|date',
            'description' => 'nullable|string',
        ];
    }
}
