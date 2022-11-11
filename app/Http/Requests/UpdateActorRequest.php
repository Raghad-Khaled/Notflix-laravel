<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActorRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'between:2,255'],
            'last_name' => ['required', 'between:2,255'],
            'image' => ['nullable', 'image', 'max:1024'],
            'birth_date' => ['required', 'date_format:Y-m-d'],
            'gender' => ['required', 'in:f,m']
        ];
    }
}
