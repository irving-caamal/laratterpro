<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMessageRequest extends FormRequest
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
        return
            [
                'message' => ['required', 'min:3', 'max:20']
            ];
    }

    public function messages()
    {
        return
            [
                'message.required' => 'Por favor escribe tu mensaje',
                'message.max' => 'El mensaje no puede superar los 144 caracteres',
                'message.min' => 'El mensaje no puede ser inferior a 3 caracteres.'
            ];
    }
}
