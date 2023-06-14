<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OcrImageRequest extends FormRequest
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
            'image' => ['required', 'image', 'mimes:png,jpg', 'max:2048'],
            'module' => ['required', 'integer', 'in:1,2'],
            'id'    => ['sometimes', 'integer', 'exists:user_information,id']
        ];
    }
}
