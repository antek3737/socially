<?php

$globUserWithIDArray = json_decode($_COOKIE['globUser'], true);
$globUser = new GlobUser($globUserWithIDArray['globName'],
    $globUserWithIDArray['globPhoneNumber'],
    $globUserWithIDArray['globEmail'],
    $globUserWithIDArray['globPassword'],
    $globUserWithIDArray['globSalt'],
    $globUserWithIDArray['globPhoto']);
?>