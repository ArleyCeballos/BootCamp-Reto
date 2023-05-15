<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'code' => 'required|max:50',
            'name' => 'required|max:100',
            'stock' => 'required|integer',
            'description' => 'nullable|max:512',
            'status' => 'required|in:active,inactive',
            'categorie_id' => 'required|exists:categories,id'
        ];
    }
}
