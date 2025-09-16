<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'image' => [
                'nullable',
                'file',
                'image',
                'max:2048',
                'mimes:jpeg,png,jpg,gif,svg',
                'dimensions:min_width=300,min_height=300,max_width=1200,max_height=1200',
            ],
            'category_id' => ['required','integer','exists:categories,id'],
            'body' => 'required|string',
        ];
    }
}
