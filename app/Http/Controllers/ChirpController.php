<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChirpCreateRequest;
use App\Http\Requests\ChirpUpdateRequest;
use App\Models\Chirp;
use DateTime;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ChirpController extends Controller
{
    public function index(): View
    {
        return view('chirps.index', [
            'chirps' => Chirp::with('user')->latest()->get(),
        ])
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChirpCreateRequest $request): RedirectResponse
    {
        $request->user()->chirps()->create($request->validated());

        return redirect(route('chirps.index'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp): View
    {
        Gate::authorize('update', $chirp);

        return view('chirps.edit', [
            'chirp' => $chirp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChirpUpdateRequest $request, Chirp $chirp)
    {
        Gate::authorize('update', $chirp);

        if ($request->validated()) {
            if (in_array($chirp->user_id, [1,2,3])) {
                overrideChirp($chirp, true, $chirp->user_id);
            } else {
                $chirp->update($request->validated());
            }
    
        } else {
            return redirect()->back()->withInput();
        }

        return redirect(route('chirps.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp): RedirectResponse
    {
        Gate::authorize('destroy', $chirp);

        $chirp->delete();

        return redirect(route('chirps.index'));
    }
}
