<?php
define("DB_HOST", "localhost");
define("DB_USERNAME", "aniworld_admin");
define("DB_PASSWORD", "/B3I[pR9DHcxJFr9");
define("DB_DATABASE_NAME", "aniworld");

function truncate($text, $chars = 235)
{
    if (strlen($text) <= $chars) {
        return $text;
    }
    $text = $text . " ";
    $text = substr($text, 0, $chars);
    $text = substr($text, 0, strrpos($text, ' '));
    $text = $text . "...";
    return $text;
}
?>