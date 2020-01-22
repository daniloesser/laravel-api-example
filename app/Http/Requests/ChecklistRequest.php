<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class ChecklistRequest extends FormRequest
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
            'series_fk' => [
                'required',
                'integer'
            ],
            'is_active' => ['required', 'integer', Rule::in(['1', '0'])]
        ];
    }

    /**
     * Get the error messages that apply to the request parameters.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'series_fk.required' => 'series_fk field is required',
            'is_active.required' => 'is_active field is required',
        ];
    }


    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'series_fk' => is_numeric($this->series_fk) ? (int)$this->series_fk : $this->series_fk,
            'is_active' => is_numeric($this->is_active) ? (int)$this->is_active : $this->is_active,
        ]);
    }
}
