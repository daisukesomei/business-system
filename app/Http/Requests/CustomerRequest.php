<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'customername' => 'required|max:255',
            'postalcode' => 'required|max:10',
            'address' => 'required|max:255',
            'tel' => 'required|max:20',
            'email' => 'email|max:20',
        ];
    }
    
    public function messages(): array
    {
        return [
            'customername.required' => 'お客様名は必須です',
            'postalcode.required' => '郵便番号は必須です。',
            'address.required' => '住所は必須です',
            'tel.required' => '電話番号は必須です',
            'email.email' => 'Emailは必須です。Email形式で入力してください。',
        ];
    }
}
