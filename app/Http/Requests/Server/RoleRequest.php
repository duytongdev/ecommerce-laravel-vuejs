<?php

namespace App\Http\Requests\Server;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        if ($this->method() == 'POST') {
            return [
                'name' => 'unique:roles'
            ];
        } else {
            return [
                'name' => 'unique:roles,name,' . $this->role
            ];
        }
    }
}
