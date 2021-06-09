<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommandRequest extends FormRequest
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
            'name' => 'string|max:255' . ($this->method === 'POST' ? '|unique:commands' : ''),
            'action' => 'string',
            'command_groups.*' => 'nullable|integer|exists:command_groups,id',
            'vnc' => 'boolean',
            'rdp' => 'boolean',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'vnc' => $this->has('vnc'),
            'rdp' => $this->has('rdp'),
        ]);
    }
}
