<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StoreDirectorPrizeMovieRequest extends FormRequest
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
            "movie_id" => ['required', 'exists:movies,id'],
            "prize_id" => [
                'required', 'exists:prizes,id',
                Rule::unique('director_prize_movies')->where('movie_id', $request->movie_id)->where('director_id', $request->director_id)

            ],
            "year" => ['required', 'Date']
        ];
    }
}
