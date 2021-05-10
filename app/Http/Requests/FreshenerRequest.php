<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class FreshenerRequest extends FormRequest
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
            'price' => 'required',
            'category_fresheners_id' => 'required',
        ];
        if (request()->method() == 'POST') {
            $rules += ['image' => 'required'];
            $rules += ['name' => 'required|unique:fresheners,name'];
        } else {

            $rules += ['image' => 'sometimes'];
            $rules += ['name' => 'required|unique:fresheners,name,' . $this->freshener->id];
        }
        return $rules;
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