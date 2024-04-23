<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificateRequest extends FormRequest
{
    CONST ACTION_DOWNLOAD = 'download';

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
            'number'=> 'required|max:12|regex:/\d{5}-\d{4}/',
            'course'=> 'required|max:64',
            'first_name'=> 'required|max:16',
            'last_name'=> 'required|max:32',
            'finished_at'=> 'required|date',
            'action' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'number.regex' => 'Number should have 00000-0000 format',
        ];
    }
}
