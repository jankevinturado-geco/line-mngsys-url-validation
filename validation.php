<?php

$url = "http://localhost";

function valid_url($value)
{

    // format check
    if (empty($value)) {
        return "false";
    }
    $data = explode('://', $value);
    if (count($data) !== 2) {
        return "false";
    }

    // scheme check
    if (!in_array(strtolower($data[0]), ['http', 'https'])) {
        return "false";
    }

    // other check
    if (filter_var($value, FILTER_VALIDATE_URL) === false) {
        return "false";
    }

    return "true";
}

function regex_url_validation($value){

    $pattern = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
    if(preg_match($pattern,$value)){
        return "true";
    }
    else{
        return "false";
    }
}

echo "result valid_url: ".valid_url($url);
echo "<br/>";
echo "result regex_url_validation: ".regex_url_validation($url);
