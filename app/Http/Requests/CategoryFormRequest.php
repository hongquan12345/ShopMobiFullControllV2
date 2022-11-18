<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        //make sure all field correrct with name in input create.blade.php 
        return [
           'name' =>[
            'required',
            'string '
           ],
           'slug' =>[
            'required',
            'string '
           ],
           'description' =>[
            'required',
           ],
           'image' =>[
            'nullable',
            'mimes:png,jpg,jepg'
           ],
           'metal_title' =>[
            'required',
            'string '
           ],
           'metal_keyword' =>[
            'required',
            'string '
           ],
           'metal_description' =>[
            'required',
            'string '
           ],
        ];
    }
}
