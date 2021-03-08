<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'email' => ['sometimes', 'email', 'unique:users,email,' . auth()->id()],
            'avatar' => ['sometimes', 'mimes:png,jpg'],
            'phone' => ['sometimes', 'unique:users,phone,' . auth()->id()],
            'birth_date' => ['sometimes', 'date'],
            'address.*.address_type' => ['required', 'in:pickup,drop'],
            'address.*.building_type' => ['required', 'in:residential,business'],
            'address.*.residential_type' => ['required_if:address.*.building_type,residential', 'in:apartment,house'],
            'address.*.street' => ['required'],
            'address.*.city' => ['required'],
            'address.*.state' => ['required'],
            'address.*.zip' => ['required'],
            'address.*.unit_number' => ['required'],
            'address.*.building_name' => ['sometimes'],
            'address.*.gate_code' => ['sometimes'],
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status' => false,
                'messages' => $validator->errors()->all(),
            ], 200)
        );
    }
}
