<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'name' => 'required|string|min:3|max:50',
        ];
    }
}

class GetUsersRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'search' => 'nullable|string',
            'page' => 'nullable|integer|min:1',
            'sortBy' => 'nullable|string|in:name,email,created_at',
        ];
    }
}
