<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhoneNumberAddRequest extends FormRequest
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
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'title' => 'required|string',
            'department' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string|digits:11|unique:topup_contacts',
            'network' => 'required|string',
            'tags.*' => 'sometimes|string',
            'max_tops' => 'required|string',
        ];
    }
}
