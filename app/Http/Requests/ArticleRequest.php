<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\BaseFormRequest;

class ArticleRequest extends BaseFormRequest
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
            'title'     =>  'required',
            'details'   =>  'required'
        ];
    }

    public function messages(){
        return [
            'title.required'    =>  'Article Title Are Missing.',
            'details.required'  =>  'Article details are missing.'
        ];
    }
}
