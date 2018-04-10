<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Channel;

class AddChannelStep5Request extends FormRequest
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
            'telegram_id' => 'required',
            'telegram_type' => 'required',
            'category_id' => 'required|numeric',
            'avatar' => 'required',
            'description' => 'required',
            'title' => 'required',
            'name' => 'required|unique:channels',
            'members_count' => 'required'
        ];
    }
}
