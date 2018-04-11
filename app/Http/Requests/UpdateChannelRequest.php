<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Channel;

class UpdateChannelRequest extends FormRequest
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
        // get current id
        $id = $this->channel;

        return [
            // 'name' => 'required|unique:channels,name,' . $id . '|between:2,255',
            'description' => 'required',
            'category_id' => 'required',
            'type_id' => 'required',
            // 'members_count' => 'required',
            'keywords' => 'required',
            'og_description' => 'required',
            'tags' => 'required',
            'telegram_id' => 'required',
            'avatar' => 'sometimes|file|mimes:jpg,png,jpeg|max:1024|dimensions:ratio=1/1,min_width:640,min_height:640',
            // 'author_id' => 'required'
        ];
    }
}
