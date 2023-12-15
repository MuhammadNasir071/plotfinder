<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required','min:3', 'max:50', 'string'],
            'price' => ['required','numeric'],
            'city' => ['required', 'string'],
            'address' => ['required', 'string'],
            'description' => ['required', 'string'],
            'size_square_meter' => ['required', 'numeric'],
            'lot_size' => ['required'],

            'build_date' => ['required'],
            'available_date' => ['required'],

            'image.*' => [ 'max:2048', 'nullable'],
        ];
    }
}
