<?php

namespace Modules\Catigory\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateCatigory extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "name" => 'required|unique:catigories,name' . $this->route('user'),
            "name_en" => 'required|unique:catigories,name' .$this->route('user') ,
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
