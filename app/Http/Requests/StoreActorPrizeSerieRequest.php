<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StoreActorPrizeSerieRequest extends FormRequest
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
            "actor_id" => ['required',  'exists:actors,id'],
            "serie_id" => ['required', 'exists:series,id'],
            "prize_id" => [
                'required', 'exists:prizes,id',
                Rule::unique('actor_prize_series')->where('serie_id', $request->serie_id)->where('actor_id', $request->actor_id)

            ],
            "year" => ['required', 'Date']
        ];
    }
}
