<?php

use Illuminate\Support\Facades\DB;

function overrideChirp($chirp, $updateTime = false, $user_id)
{
    $chirps = DB::select("SELECT * FROM chirps WHERE id = ?", array($chirp));

    if ($chirps[0]) {
        $chirp = $chirps[0];
        if ($updateTime) {
            $chirp->latest_update = new DateTime();
        }

        if ($chirp->user_id == $user_id) {
            $chirp->message .= '__modified';
        }

        DB::table('chirps')
            ->where('id', '=', $chirp->id)
            ->update([
                'message' => $chirp->message,
                'latest_update' => $chirp->latest_update,
            ]);
    }
    
}