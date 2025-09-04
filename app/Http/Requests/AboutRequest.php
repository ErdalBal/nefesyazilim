<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'name' => 'required',
            'surename' => 'required',
            'age' => 'required',
        ];
    }


    public function messages():array
    {
       
     return   [

            'name.required' => 'İsim alanı boş geçilemez',
            'surename.required' => 'Soyisim alanı boş geçilemez',
            'age.required' => 'Yaş alanı boş geçilemez',
           

        ];

    }
}
