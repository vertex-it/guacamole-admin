<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommandGroupRequest extends FormRequest
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
            'name' => 'string|max:255' . ($this->method === 'POST' ? '|unique:command_groups' : ''),
            'commands.*' => 'integer|exists:commands,id',
            'guac_users.*' => 'exists:guacamole_user,user_id',
        ];
    }
}
