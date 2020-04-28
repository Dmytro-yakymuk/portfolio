<?php

/**
 * @param null $value
 * @param int $die
 */
function dd($value = null, $die = 1)
{
    echo "Debug: <br /><pre>";
    print_r($value);
    echo "</pre>";

    if($die) die;
}











