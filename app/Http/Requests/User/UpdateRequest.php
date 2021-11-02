<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            
            'name' => 'required|string|max:255',
            'dob'  => 'required|date',
            'email' => 'required|email|unique:users,email,' . $this->route('user')->id . '|max:255',
            
        ];
    }

    public function messages()
    {
        return [
            
            'name.required' => 'Este campo es requerido',
            'name.string' => 'El valor no es correcto',
            'dob.required'  => 'Este campo es requerido',
            'email.required' => 'Este campo es requerido',
            'email.unique' => 'Este email ya esta en uso',

        ];
    }
}
