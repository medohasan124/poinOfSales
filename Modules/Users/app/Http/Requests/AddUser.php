<?php

namespace Modules\Users\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;
use Modules\Users\app\Rules\UserRule ;
class addUser extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' =>'required' ,
            'email' =>'required|email|unique:users,email' ,
            'password' =>'required|min:8' ,
            'mobile' => 'required|unique:users,mobile'  ,
            'role' =>'required|numeric|not_in:0' ,
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
