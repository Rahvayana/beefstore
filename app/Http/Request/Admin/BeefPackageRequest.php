<?php

namespace App\Http\Request\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BeefPackageRequest extends FormRequest
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
            'title' => 'required|max:255',
            'beeftype' => 'required|max:255',
            'about' => 'required',
            'language' => 'required|max:255',
            'type' => 'required|max:255',
            'price' => 'required|integer',
            'shipping' => 'required|integer'
        ];
    }
}