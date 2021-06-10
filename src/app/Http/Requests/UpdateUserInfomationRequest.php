<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserInfomationRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:30', 'unique:users,email,'.Auth::user()->email.',email'],
            'current-password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if(!(\Hash::check($value, \Auth::user()->password))) {
                        return $fail('現在のパスワードを正しく入力してください');
                    }
                },
            ],
            'new-password' => ['required', 'string', 'min:8', 'regex:/\A([a-zA-Z0-9]{8,})+\z/u', 'confirmed'],
        ];
    }
}
