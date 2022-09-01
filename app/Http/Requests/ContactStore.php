<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactStore extends FormRequest
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
        $rules = [
            'first_name' => ['nullable', 'string', 'min:2', 'max:255'],
            'last_name' => ['nullable', 'string', 'min:2', 'max:255'],
            'company' => ['nullable', 'string', 'min:2', 'max:255'],
            'address' => ['nullable', 'string', 'min:2', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string'],
        ];
        return $rules;
    }
}
