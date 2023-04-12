<?php
//slug creator
function clean($string,$symbol="-") 
{
    $string = str_replace(' ', $symbol, $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    
    return preg_replace('/-+/', $symbol, strtolower($string)); // Replaces multiple hyphens with single one.
}
?>