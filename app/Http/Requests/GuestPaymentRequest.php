<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestPaymentRequest extends FormRequest
{
    public function all($keys = null)
    {
        $requestData = parent::all($keys);
        // Modify data as needed
        $requestData['phone'] = '+'.$requestData['phone_code'].$requestData['phone'];

        return $requestData;
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'birth_date' => 'required|date',
            'city' => 'required|string',
            'birth_state' => 'required|string',
            'phone' => 'required|phone',
            'email' => 'required|email',
            'address' => 'required|string',
            'state' => 'required|string|max:100',
            'zip' => 'required|string|max:20|min:4',
            'gender' => 'required|string|in:male,female,others',
            'country_id' => 'required|exists:countries,id',
            'password' => 'required|string|min:8|confirmed',
            'country_of_birthday' => 'required|string|max:100',
            'terms' => 'accepted',
        ];

    }

    public function messages()
    {
        return [
            'zip.regex' => 'The ZIP code format is invalid.',
            'phone.phone' => 'Please enter a valid phone number.',
            'phone.exists' => 'This phone number has already exists.',
            'terms.accepted' => 'You must accept the terms and conditions.',
        ];
    }
}
