<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            "year" => ['required', 'Date'],
            "link" => ['required', 'url'],
            "language" => ['required'],
            "revenue" => ['required', 'numeric'],
            "budget" => ['required', 'numeric'],
            "duration" => ['required', 'regex:/^\d+:\d{2}$/'],
            "imdb_rate" => ['required', 'numeric'],
            "imdb_rate_count" => ['required', 'numeric'],
            "director_id" => ['required', 'exists:directors,id'],
            "story_id" => ['nullable', 'exists:stories,id'],
            "genre_id" => ['required', 'array', 'exists:genres,id'],
            "company_id" => ['required', 'array', 'exists:companies,id'],
            "actor_id" => ['required', 'array', 'exists:actors,id'],
            "description" => ['required'],
            'image' => ['required', 'image', 'max:1024'],
        ];
    }
}
