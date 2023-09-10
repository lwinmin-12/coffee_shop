<?php

function url(string $path = null): string
{
    $url = isset($_SERVER["HTTPS"]) ? "https" : "http";
        $url .= "://";
        $url .= $_SERVER["HTTP_HOST"];
    if (isset($path)) {
         $url .= "/";
        $url .= $path;
    }
    return $url;
}