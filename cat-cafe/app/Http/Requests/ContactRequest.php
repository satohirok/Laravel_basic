<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|max:255',
            'name_kana' => 'required|max:255',
            'phone' => [
                'nullable',
                'max:20',
                // 日本の「0から始まる」電話番号（ハイフン有り/無し）
                'regex:/^(0\d{1,4}-\d{1,4}-\d{4}|0\d{9,10})$/u',
            ],
            'email' => 'required|email|max:255',
            'body' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'body' => 'お問い合わせ内容',
        ];
    }
}
