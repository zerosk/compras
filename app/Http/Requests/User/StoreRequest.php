<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'role' => 'required|numeric',
            'name' => 'required|string|max:255',
            'dob'  => 'required|date',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'role.required' => 'Este campo es requerido',
            'role.numeric' => 'El valor no es correcto',
            'name.required' => 'Este campo es requerido',
            'name.string' => 'El valor no es correcto',
            'dob.required'  => 'Este campo es requerido',
            'email.required' => 'Este campo es requerido',
            'email.unique' => 'Este email ya esta en uso',

            'password.required' => 'Este campo es requerido',
            'password.confirmed' => 'La contraseña no coinciden',
        ];
    }
}
