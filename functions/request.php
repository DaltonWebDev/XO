<?php
function request($url, $data, $method) {
    $options = [
        "http" => [
            "method" => $method,
            "content" => http_build_query($data),
            "header" => "Content-Type: application/x-www-form-urlencoded"
        ]
    ];
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === false) {
        return false;
    } else {
        return $result;
    }
}