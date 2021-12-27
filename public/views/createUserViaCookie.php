<?php

$globUserWithIDArray = json_decode($_COOKIE['globUser'], true);
$globUser = new GlobUser($globUserWithIDArray['globName'],
    $globUserWithIDArray['globPhoneNumber'],
    $globUserWithIDArray['globEmail'],
    $globUserWithIDArray['globPassword'],
    $globUserWithIDArray['globSalt'],
    $globUserWithIDArray['globPhoto']);

$avatar = $globUser->getGlobPhoto();
$name = $globUser->getGlobName();
$description = 'You may set your description in settings';

if(isset($_COOKIE['localUser'])){
    $localUserWithIdArray = json_decode($_COOKIE['localUser'],true);
    $localUser = new LocalUser(
        $localUserWithIdArray['localName'],
        $localUserWithIdArray['localDescription'],
        $localUserWithIdArray['localPhoto']
    );
    $avatar = $localUser->getLocalPhoto();

    if($localUser->getLocalName() !== null && $localUser->getLocalName() !== '' ){
        $name = $localUser->getLocalName();
    }

    if($localUser->getLocalDescription() !== null && $localUser->getLocalDescription() !== '' ){
        $description = $localUser->getLocalDescription();
    }

}

?>