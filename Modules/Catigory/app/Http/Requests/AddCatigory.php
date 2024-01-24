<?php

namespace Modules\Catigory\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addCatigory extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "name" => 'required|unique:catigories,name' ,
            "name_en" => 'required|unique:catigories,name' ,
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
