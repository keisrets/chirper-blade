<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class AbstractChirpRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'message' => 'required|string|max:255',
        ];
    }
}
