<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/GlobUser.php';

class GlobUserRepository extends Repository
{

    public function getGlobUser(string $globEmail): ?GlobUser
    {

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."GlobUser" 
            WHERE "globEmail" = :globEmail
        ');

        $stmt->bindParam(':globEmail', $globEmail, PDO::PARAM_STR);

        $stmt->execute();

        $globUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($globUser == false) {
            throw new InvalidArgumentException("User with this email does not exists!");
        }

        $cookie_name = "globUser";
        $cookie_value = json_encode($globUser);
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");


        return new GlobUser(
            $globUser['globName'],
            $globUser['globPhoneNumber'],
            $globUser['globEmail'],
            $globUser['globPassword'],
            $globUser['globSalt'],
            $globUser['globPhoto']
        );

    }

    public function getGlobUserID(GlobUser $GlobUser): int
    {

        $stmt = $this->database->connect()->prepare('
            SELECT "IDglobUser" FROM public."GlobUser" 
            WHERE "globName" = :globName and 
                  "globEmail"=:globEmail and 
                  "globPhoneNumber"=:globPhoneNumber
            
        ');


        $globName = $GlobUser->getGlobName();
        $globEmail = $GlobUser->getGlobEmail();
        $globPhoneNumber = $GlobUser->getGlobPhoneNumber();

        $stmt->bindParam(':globName', $globName, PDO::PARAM_STR);
        $stmt->bindParam(':globEmail', $globEmail, PDO::PARAM_STR);
        $stmt->bindParam(':globPhoneNumber', $globPhoneNumber, PDO::PARAM_STR);
        $stmt->execute();

        $globUserID = $stmt->fetchColumn(0);

        if ($globUserID == false) {
            throw new InvalidArgumentException("User does not exists!");
        }

        return $globUserID;
    }

    public function isGlobEmailTaken(string $globEmail): bool
    {

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."GlobUser" WHERE "globEmail" = :globEmail
        ');

        $stmt->bindParam(':globEmail', $globEmail, PDO::PARAM_STR);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result == false) {
            return false;
        }

        return true;


    }

    public function isGlobNameTaken(string $globName): bool
    {

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."GlobUser" WHERE "globName" = :globName
        ');

        $stmt->bindParam(':globName', $globName, PDO::PARAM_STR);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result == false) {
            return false;
        }

        return true;

    }

    public function isGlobPhoneNumberTaken(string $GlobPhoneNumber): bool
    {

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."GlobUser" WHERE "globPhoneNumber" = :globPhoneNumber
        ');

        $stmt->bindParam(':globPhoneNumber', $GlobPhoneNumber, PDO::PARAM_STR);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result == false) {
            return false;
        }

        return true;

    }


    public function createGlobUser(GlobUser $globUser)
    {

        $stmt = $this->database->connect()->prepare('
           INSERT INTO public."GlobUser" ("globName", "globPhoneNumber", "globEmail", "globPassword", "globSalt", "globPhoto")
           VALUES(?,?,?,?,?,?)
        ');

        $stmt->execute(
            [
                $globUser->getGlobName(),
                $globUser->getGlobPhoneNumber(),
                $globUser->getGlobEmail(),
                $globUser->getGlobPassword(),
                $globUser->getGlobSalt(),
                $globUser->getGlobPhoto()
            ]
        );

    }

}