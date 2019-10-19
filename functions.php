<?php


function get_content($url, $data = [],$getlink = null)
{

    $ch = curl_init($url);
    if ($data != null) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    if($getlink == null)
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_COOKIEJAR, __DIR__ . 'cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEFILE, __DIR__ . 'cookie.txt');
    $res = curl_exec($ch);
    curl_close($ch);
    return $res;
}

function clearStr($string) {
    $old_string = $string;
    $string = strip_tags($string);
    $string = preg_replace('/([^\pL\pN\pP\pS\pZ])|([\xC2\xA0])/u', ' ', $string);
    $string = str_replace('  ',' ', $string);
    $string = trim($string);

    if ($string === $old_string) {
        return $string;
    } else {
        return clearStr($string);
    }
}