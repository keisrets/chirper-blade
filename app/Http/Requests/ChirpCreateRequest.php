<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChirpCreateRequest extends AbstractChirpRequest
{
    public function authorize(): bool
    {
        return true;
    }
}
