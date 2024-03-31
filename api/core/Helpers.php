<?php

/**
 * The clean function is used to sanitize input data.
 *
 * @param   string  $data The input data to be sanitized.
 * @return  string  The sanitized data.
 */
function clean($data)
{
    return trim(htmlspecialchars($data, ENT_COMPAT, 'UTF-8'));
}

/**
 * The cleanUrl function is used to sanitize a URL, replacing spaces with hyphens.
 *
 * @param   string  $url The URL to be sanitized.
 * @return  string  The sanitized URL.
 */
function cleanUrl($url)
{
    return str_replace(['%20', ' '], '-', $url);
}
