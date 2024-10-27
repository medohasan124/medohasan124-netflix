<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class updateRquest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:users,name,' . $this->route('user'),
            'email' => 'required|unique:users,email,' . $this->route('user'),
            'password' => 'sometimes|nullable|confirmed|max:8|min:6',
            'role' => 'required|exists:roles,id',
        ];
    }
}
