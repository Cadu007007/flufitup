<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class DryerRequest extends FormRequest
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
        $rules += ['category_dryers_id' => ['required']];
        if (request()->isMethod('POST')) {
            $rules += ['name' => ['required', 'unique:dryers,name']];
            $rules += ['image' => ['required', 'image']];
        } else {
            $rules += ['name' => ['required', 'unique:dryers,name,' . $this->dryer->id]];
            $rules += ['image' => ['sometimes', 'image']];

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
