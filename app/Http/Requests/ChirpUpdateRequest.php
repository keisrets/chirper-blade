<?php

namespace App\Http\Requests;

use App\Models\Chirp;
use Illuminate\Foundation\Http\FormRequest;

class ChirpUpdateRequest extends AbstractChirpRequest
{
    public function authorize(): bool
    {
        $chirp = Chirp::find($this->route('chirp'));

        return $chirp && $this->user()->can('update', $chirp);
    }
}
