<?php

function modifyTimestamp($time)
{
    $dt = new DateTime($time);
    $dt->modify('-1 year');

    return new DateTime($dt->format('d-m-Y H:i:s'));
    return $dt->format('d-m-Y H:i:s');
}