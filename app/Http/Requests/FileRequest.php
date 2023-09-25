<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
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
            'File' => [
            'required' ,
             'file' ,
             'mimes:txt,pdf,doc,docx,jpeg,png,mp4' ,
             'max:10240'
            ], //kilobytes
            'email' => 'required|email|max:255',
            'title' => 'required|string|max:100',
            'message' => 'required|string|max:1000',
        ];
    }
}