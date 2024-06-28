<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesprojectRequest extends FormRequest
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
        // 共通のバリデーションルールを定義
        $rules = [
            'price' => 'numeric|between:0,1000000000',
            'comment' => 'required|max:255',
        ];

        // customer_idがセットされていない場合の追加ルール
        if (!$this->has('customer_id')) {
            $rules = array_merge($rules, [
                'customername' => 'required|max:255',
                'postalcode' => 'required|max:10',
                'address' => 'required|max:255',
                'tel' => 'required|max:20',
                'email' => 'required|email|max:255',
            ]);
        }

        return $rules;
    }
    
    public function messages(): array
    {
        return [
                'customername.required' => 'お客様名は必須です',
                'postalcode.required' => '郵便番号は必須です。',
                'address.required' => '住所は必須です',
                'tel.required' => '電話番号は必須です',
                'email.email' => 'Emailは必須です。Email形式で入力してください。',
                'price' => '収入は必須です。0～の数字で入力してください。',
                'comment' => 'コメントは必須です',
                ];
    }
}
