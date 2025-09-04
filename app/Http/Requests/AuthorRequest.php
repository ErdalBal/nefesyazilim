<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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

        $userId = $this->route('author');
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$userId,
            
        ];
    }


public function messages() : array
{
    return [

        'name.required' => 'Ad alanı gerekli',
       
        'email.required' => 'E-posta alanı gerekli',
        'email.email' => 'Geçerli bir e-posta giriniz',
        'email.unique' => 'E-posta kullanımda',


    ];
}


}
