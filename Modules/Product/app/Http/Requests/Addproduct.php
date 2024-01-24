<?php

namespace Modules\Product\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addproduct extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "name" => 'required' ,
            "name_en" => 'required' ,
            'description' => 'required' ,
            'first_price' => 'required' ,
            'last_price' => 'required' ,
            'sreialNumber' => 'required' ,
            'store' => 'required' ,
            'cat_id' => 'required' ,
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
