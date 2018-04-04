<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\StaticPage;

class UpdateStaticPageRequest extends FormRequest
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
        $id = $this->staticPage;

        return  [
            'name' => 'required|unique:static_pages,name,' . $id . '|between:2,255',
            'content' => 'required',
            'keywords' => 'sometimes',
            'og_description' => 'sometimes'
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

            // slug
            if (!isset($data['name'])) {
                $validator->errors()->add('slug', 'Slug is required with name present');
            }
        });
    }
}
