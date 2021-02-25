<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class HouseholdRequest extends FormRequest
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
        $rules = ['price' => ['required', 'numeric']];
        if (request()->method() == 'POST') {
            $rules += ['name' => ['required', 'unique:households,name']];
        } else {
            $rules += ['name' => ['required', 'unique:households,name,' . $this->household->id]];

        }
        return $rules;
    }

    public function response(array $errors)
    {
        if ($this->expectsJson()) {
            return new JsonResponse($errors, 422);
        }

    }
}
