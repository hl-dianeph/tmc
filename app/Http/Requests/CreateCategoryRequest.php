<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\File;

class CreateCategoryRequest extends FormRequest
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
            'name' => 'required|unique:categories|between:2,255',
            'short_desc' => 'required',
            'full_desc' => 'required',
            'image' => 'required|file|mimes:jpeg,jpg,png|max:1024',
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
