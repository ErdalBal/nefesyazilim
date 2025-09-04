<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
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
    $rules = [
        "title" => "required",
        "subtitle" => "required",
    ];

    if ($this->isMethod('post')) {
        // Sadece 'POST' isteklerinde 'file' alanını zorunlu yap
        $rules['file'] = 'required';
    }

    return $rules;
}

public function messages(): array
{
    $messages= [
        "title.required" => "Başlık alanı gerekli",
        "subtitle.required" => "Alt başlık alanı gerekli",
       
    ];

    if ($this->isMethod('post')) {
        // Sadece 'POST' isteklerinde 'file' alanını zorunlu yap
        $messages['file.required'] = "Resim alanı gerekli";
    }

    return$messages;

}



}
