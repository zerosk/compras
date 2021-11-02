<?php

namespace App\Http\Requests\Permission;

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
            //
            'name' => 'required|unique:roles|max:255',
            'description' => 'required',
            'role_id' => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
        'name.required' => 'El campo es requerido',
        'name.unique' =>    'El nombre ya esta ocupado',
        'description.required' =>    'La descripcion es requerida',
        'role_id.required' => 'Selecciona un rol',
        ];
    }
}
