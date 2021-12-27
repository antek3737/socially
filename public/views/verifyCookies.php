<?php
if (!isset($_COOKIE['globUser'])) {
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/logging");
}

if (!isset($_COOKIE['group'])) {
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/logging");
}
?>