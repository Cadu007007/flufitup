<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PackageRequest extends FormRequest
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
            'name' => ['required', 'unique:packages,name'],
            'price' => ['required', 'numeric'],
            'category' => ['required'],
            'no_pickups' => ['required', 'numeric'],
            'advance_notice' => ['required', 'numeric'],
            'bags_per_pickup' => ['required', 'numeric'],
            'return_service' => ['required', 'numeric'],
            'dryer_option' => ['required'],
            'washing_option' => ['required'],
            'detergent_id' => ['required'],
            'laundry_softener' => ['required'],
            'fabric_id' => ['sometimes'],
            'freshener_id' => ['sometimes'],
            'scent_id' => ['sometimes'],
            'dryer_id' => ['sometimes'],
            'dry_clean_credit' => ['sometimes'],
            'house_hold_credit' => ['sometimes'],
            'added_value_service' => ['sometimes'],
            'reward_points' => ['sometimes'],
            'price_of_extra_pound' => ['sometimes'],

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
