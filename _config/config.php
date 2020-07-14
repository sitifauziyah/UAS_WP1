<?php
date_default_timezone_set('Asia/jakarta');
session_start();
global $con;
$con = mysqli_connect('localhost', 'root', '', 'miniso');
if (mysqli_connect_error()) {
    echo mysqli_connect_error();
}

function base_url($url = null)
{
    $base_url = "http://localhost";
    if ($url != null) {
        return $base_url . "/uas/" . $url;
    } else {
        return $base_url;
    }
}