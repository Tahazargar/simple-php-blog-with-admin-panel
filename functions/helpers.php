<?php

// Base URL

define('BASE_URL', 'http://localhost/blog');

// Redirect

function redirect($url)
{
    header('Location:' . trim(BASE_URL, '/ ') . '/' . trim($url, '/ '));
}

// Assets

function asset($file)
{
    return trim(BASE_URL, '/ ') . '/' . trim($file, '/ ');
}

// URLs

function url($url)
{
    return trim(BASE_URL, '/ ') . '/' . trim($url, '/ ');
}

function dd($file){
    return var_dump($file);
    exit;
}