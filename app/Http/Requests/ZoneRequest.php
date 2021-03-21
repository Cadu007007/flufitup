<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ZoneRequest extends FormRequest
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
        // return $this;
        $rules = [
            'cities' => 'required',
            'cities.*.name' => 'required',
            'cities.*.processing' => 'required',
            'cities.*.washing' => 'required',
        ];
        if (request()->method() == 'POST') {

            $rules += ['name' => 'required|unique:zones,name'];
        } else {

            $rules += ['name' => 'required|unique:zones,name,' . $this->id];
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
