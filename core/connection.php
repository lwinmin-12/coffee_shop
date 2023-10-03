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

function alert(string $message, string $color = "success"){
    return "<div style='top : 7rem; right : 0; z-index :100;' class='alert alert-$color w-25 position-absolute m-0 '>$message</div>";
}
