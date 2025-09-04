<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceAboutRequest extends FormRequest
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
            'service_start' => 'nullable',
            'service_finish' => 'nullable',
            'title' => 'required',
            'content' => 'content'
        ];
    }

public function messages(): array
{
    return [
        'title.required'=> 'Başlık alanı boş geçilemez',
        'description.required'=> 'İçerik alanı boş geçilemez',
    ];
}



}
