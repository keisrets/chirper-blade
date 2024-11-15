<?php

namespace App\Http\Requests;

class ChirpUpdateRequest extends AbstractChirpRequest
{
    public function authorize(): bool
    {
        $chirp = $this->route('chirp');

        return $chirp && $this->user()->can('update', $chirp);
    }
}
