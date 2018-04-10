<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Channel;

class AddChannelStep3Request extends FormRequest
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
        return  [
            // 'avatar' => 'required|file|mimes:jpeg,jpg,png|max:1024',
            'category_id' => 'required|numeric',
            'description' => 'required',
            'email' => 'required|email'
        ];
    }
}
