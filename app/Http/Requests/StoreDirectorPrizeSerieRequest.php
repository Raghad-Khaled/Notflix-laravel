<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreDirectorPrizeSerieRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            "director_id" => ['required',  'exists:directors,id'],
            "serie_id" => ['required', 'exists:series,id'],
            "prize_id" => [
                'required', 'exists:prizes,id',
                Rule::unique('director_prize_series')->where('serie_id', $request->serie_id)->where('director_id', $request->director_id)
            ],
            "year" => ['required', 'Date']
        ];
    }
}
