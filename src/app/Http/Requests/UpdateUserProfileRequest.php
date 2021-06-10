<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'profile_image' => ['nullable', 'file', 'image', 'mimes:jpeg,png'],
            'name' => ['required', 'string', 'max:50'],
            'introduction' => ['nullable', 'string', 'max:160'],
            'age' => ['required', 'regex:/^[0-9]+$/i'],
            'prefecture' => ['required', 'string'],
        ];
    }
}
