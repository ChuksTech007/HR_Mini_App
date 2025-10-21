<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Allows anyone authenticated to use this request
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email', // Unique Email
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0', // Numeric/Min Salary
            'department' => 'required|string|max:255',
        ];
    }
}
