<?php

function overrideChirp($chirp) {
    $chirp->latest_update = new DateTime('-3 years');

    if ($chirp->user_id === 1) {

        $chirp->message = '[redacted]';

    }

    $chirp->save();
}