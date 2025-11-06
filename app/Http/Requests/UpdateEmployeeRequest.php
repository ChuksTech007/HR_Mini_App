<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    public function rules()
    {
        $employeeId = $this->route('employee')->id ?? null;

        return [
            'name' => 'required|string|max:255',
            'email' => ['required','email', \Illuminate\Validation\Rule::unique('employees')->ignore($employeeId)],
            'position' => 'nullable|string|max:255',
            'salary' => 'required|numeric|min:0',
            'department' => 'nullable|string|max:255',
        ];
    }
}
