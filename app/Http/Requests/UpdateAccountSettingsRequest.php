<?php

namespace App\Http\Requests;

use App\Models\Setting;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateAccountSettingsRequest extends FormRequest
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
        $id = Auth::user()->id;

        return [
            'email' => 'required|email|unique:users,email,' . $id,
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $data = $validator->getData();
            $password = Auth::user()->password;
            
            // dd([$data, $password, Hash::make($data['old_password'])]);

            // check pass
            if (!Hash::check($data['old_password'], $password)) {
                $validator->errors()->add('slug', 'Старый пароль указан неверно.');
            }
        });
    }
}
