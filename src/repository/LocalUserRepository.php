<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/LocalUser.php';

class LocalUserRepository extends Repository
{

    public function updateLocalUserDescription(string $description)
    {
        $stmt = $this->database->connect()->prepare('
            UPDATE "LocalUser"
            SET  "localDescription" =:localDescription
            WHERE "IDglobUserlocalUser"=:IDglobUserlocalUser;
        ');

        $IDcookie = json_decode($_COOKIE['IDGlobUserLocalUser'], true);
        $ID = $IDcookie['IDGlobUserLocalUser'];

        $stmt->bindParam(':localDescription', $description);
        $stmt->bindParam(':IDglobUserlocalUser', $ID);

        $stmt->execute();
    }

    public function updateLocalUserName(string $name)
    {
        $stmt = $this->database->connect()->prepare('
           UPDATE "LocalUser"
           SET "localName" =:localName
           WHERE "IDglobUserlocalUser"=:IDglobUserlocalUser;
        ');

        $IDcookie = json_decode($_COOKIE['IDGlobUserLocalUser'], true);
        $ID = $IDcookie['IDGlobUserLocalUser'];

        $stmt->bindParam(':localName', $name);
        $stmt->bindParam(':IDglobUserlocalUser', $ID);

        $stmt->execute();
    }

    public function updateLocalUserPhoto(string $photo)
    {
        $stmt = $this->database->connect()->prepare('
            UPDATE "LocalUser"
            SET "localPhoto" =:localPhoto
            WHERE "IDglobUserlocalUser"=:IDglobUserlocalUser;
        ');

        $IDcookie = json_decode($_COOKIE['IDGlobUserLocalUser'], true);
        $ID = $IDcookie['IDGlobUserLocalUser'];


        $stmt->bindParam(':localPhoto', $photo);
        $stmt->bindParam(':IDglobUserlocalUser', $ID);

        $stmt->execute();
    }


    public function getLocalUser(): LocalUser

    {

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."LocalUser"
            WHERE "IDglobUserlocalUser" = :IDglobUserlocalUser
        ');

        $IDcookie = json_decode($_COOKIE['IDGlobUserLocalUser'], true);
        $ID = $IDcookie['IDGlobUserLocalUser'];

        $stmt->bindParam(':IDglobUserlocalUser', $ID, PDO::PARAM_INT);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result == false) {
            throw new Exception("User account has not been created already");
        }

        $localUser = new LocalUser(
            $result['localName'],
            $result['localDescription'],
            $result['localPhoto']
        );

        $localUser->setIDglobUserlocalUser($result['IDglobUserlocalUser']);
        $localUser->setIDlocalUser($result['IDlocalUser']);

        return $localUser;

    }

    public function getLocalUserViaIDglobUserlocalUser($IDglobUserlocalUser): LocalUser

    {

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."LocalUser"
            WHERE "IDglobUserlocalUser" = :IDglobUserlocalUser
        ');


        $stmt->bindParam(':IDglobUserlocalUser', $IDglobUserlocalUser, PDO::PARAM_INT);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result == false) {
            throw new Exception("User account has not been created already");
        }

        $localUser = new LocalUser(
            $result['localName'],
            $result['localDescription'],
            $result['localPhoto']
        );

        $localUser->setIDglobUserlocalUser($result['IDglobUserlocalUser']);
        $localUser->setIDlocalUser($result['IDlocalUser']);

        return $localUser;

    }

    public function refreshLocalUserCookie($IDglobUserlocalUser)
    {
        $cookie_name = "localUser";
        try {
            $localUser = $this->getLocalUserViaIDglobUserlocalUser($IDglobUserlocalUser);

            $value['IDlocalUser'] = $localUser->getIDlocalUser();
            $value['IDglobUserlocalUser'] = $localUser->getIDglobUserlocalUser();
            $value['localName'] = $localUser->getLocalName();
            $value['localDescription'] = $localUser->getLocalDescription();
            $value['localPhoto'] = $localUser->getLocalPhoto();
            $cookie_value = json_encode($value);
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        } catch (Exception $e) {
            setcookie($cookie_name, '',  time()-3600, "/");
        }
    }


    public function createLocalUser()
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO "LocalUser" ("IDglobUserlocalUser")
            VALUES (?);
        ');

        $IDcookie = json_decode($_COOKIE['IDGlobUserLocalUser'], true);
        $ID = $IDcookie['IDGlobUserLocalUser'];
        $stmt->execute([$ID]);


    }


}