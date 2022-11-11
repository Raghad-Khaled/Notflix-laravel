<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCharacterRequest extends FormRequest
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
            'name' => ['required', 'between:2,100'],
            'overview' => ['required', 'between:2,1000'],
            'story_id' => ['required', 'exists:stories,id'],
            'image' => ['nullable', 'image', 'max:1024'],
            'gender' => ['required', 'in:f,m']
        ];
    }
}
