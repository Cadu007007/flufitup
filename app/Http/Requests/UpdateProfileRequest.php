<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'email' => ['required', 'email', 'unique:users,email,' . auth()->id()],
            'avatar' => ['sometimes', 'mimes:png,jpg'],
            'phone' => ['required', 'unique:users,phone,' . auth()->id()],
            'birth_date' => ['required', 'date'],
            'address.*.address_type' => ['required', 'in:pickup,drop'],
            'address.*.building_type' => ['required', 'in:residential, business'],
            'address.*.residential_type' => ['required_if:building_type,residential', 'in:apartment,house'],
            'address.*.street' => ['required'],
            'address.*.city' => ['required'],
            'address.*.state' => ['required'],
            'address.*.zip' => ['required'],
            'address.*.unit_number' => ['required'],
            'address.*.building_name' => ['sometimes'],
            'address.*.gate_code' => ['sometimes'],
        ];
    }
}
