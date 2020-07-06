<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClaimRequest extends FormRequest
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
            'name' => ['required'],
            'phone' => ['required'],
            'message' => ['required'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'message' =>  htmlspecialchars($this->message),
        ]);
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле "Имя" обязательно для заполнения',
            'phone.required' => 'Поле "Телефон" обязательно для заполнения',
            'message.required' => 'Поле "Сообщение" обязательно для заполнения',
        ];
    }
}
