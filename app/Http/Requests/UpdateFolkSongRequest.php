<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFolkSongRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $folkSong = $this->route('folkSong');

        return [
            'title' => ['required', 'unique:folk_songs,title,'.$folkSong->id],
            'song' => ['required'],
            'region' => ['required'],
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'judul',
            'song' => 'lagu',
            'region' => 'daerah',
        ];
    }
}
