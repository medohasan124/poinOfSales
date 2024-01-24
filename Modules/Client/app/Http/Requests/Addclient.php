<?php

namespace Modules\client\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addclient extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "name" => 'required|unique:clients,name' ,
            "mobile" => 'required|unique:clients,name' ,
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
