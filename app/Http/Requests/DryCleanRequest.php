<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class DryCleanRequest extends FormRequest
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
        if (request()->isMethod('POST')) {
            $rules += ['name' => ['required', 'unique:dry_cleans,name']];
        } else {
            $rules += ['name' => ['required', 'unique:dry_cleans,name,' . $this->dryClean->id]];

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
