<?php
login($_POST);
function login($data)
{
    $post = [
        "username" => "root",
        "password" => "sUP3R53CR3T#"
    ];
    $url = "https://campus.csbe.ch/sollberger-manuel/uek307/Authenticate";
    $curlObj = curl_init();

    curl_setopt($curlObj, CURLOPT_URL, $url);
    curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curlObj, CURLOPT_POST, 1);
    curl_setopt($curlObj, CURLOPT_POSTFIELDS, $post);
    curl_setopt($curlObj, CURLOPT_HEADER, 1);
    curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, false);

    $result = curl_exec($curlObj);
    curl_close($curlObj);
    var_dump($result);
    return json_decode($result);
}
