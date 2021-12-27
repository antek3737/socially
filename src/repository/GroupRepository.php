<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Group.php';

class GroupRepository extends Repository
{

    public function getGroup(string $groupName): Group
    {

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."Group" WHERE "groupName" = :groupName
        ');

        $stmt->bindParam(':groupName', $groupName, PDO::PARAM_STR);

        $stmt->execute();

        $Group = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($Group == false) {
            throw new InvalidArgumentException("Group with this name does not exists!");
        }

        return new Group(
            $Group['groupName'],
            $Group['groupPassword'],
            $Group['groupSalt'],
            $Group['IDgroup']
        );

    }

    public function isGroupNameTaken(string $groupName): bool
    {

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."Group" WHERE "groupName" = :groupName
        ');

        $stmt->bindParam(':groupName', $groupName, PDO::PARAM_STR);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result == null) {
            return false;
        }

        return true;

    }

    public function createGroup(Group $group)
    {

        $stmt = $this->database->connect()->prepare('
           INSERT INTO public."Group" ("groupName","groupPassword","groupSalt")
           VALUES(?,?,?)
        ');

        $stmt->execute(
            [
                $group->getGroupName(),
                $group->getGroupPassword(),
                $group->getGroupSalt()
            ]
        );

    }

    public function generateGlobUserLocalUserConnection(int $IDglobUser)
    {

        $stmt = $this->database->connect()->prepare('
           INSERT INTO public."GlobUserLocalUser" ("IDglobUser")
           VALUES(?) RETURNING  "IDglobUserlocalUser"
        ');

        try {

            $stmt->execute([$IDglobUser]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $id = $result['IDglobUserlocalUser'];
            return $id;

        } catch (PDOException $PDOException) {

            throw new InvalidArgumentException("Local user account has not been generated!");

        }

    }

    public function generateGlobUserLocalUserGroupConnection(int $IDglobUserlocalUser, int $IDgroup)
    {

        $stmt = $this->database->connect()->prepare('
           INSERT INTO public."GlobUserLocalUserGroup" ("IDglobUserlocalUser", "IDgroup")
           VALUES(?,?) RETURNING  "IDglobUserlocalUsergroup"
        ');

        try {
            $stmt->execute([
                $IDglobUserlocalUser,
                $IDgroup
            ]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $id = $result['IDglobUserlocalUsergroup'];
            return $id;
        } catch (PDOException $PDOException) {

            $stmt = $this->database->connect()->prepare('
           DELETE FROM public."GlobUserLocalUser" WHERE "IDglobUserlocalUser" = :IDglobUserlocalUser');
            $stmt->bindParam(':IDglobUserlocalUser', $IDglobUserlocalUser, PDO::PARAM_INT);
            $stmt->execute();
            $excMsg = "You have added this group before!" . "ur local user id = " . $IDglobUserlocalUser;
//            throw new InvalidArgumentException("You have added this group before!");
            throw new InvalidArgumentException($excMsg);

        }
    }

    public function getIDglobUserLocalUser()
    {

        $stmt = $this->database->connect()->prepare('
            SELECT "GlobUserLocalUser"."IDglobUserlocalUser" as "IDglobUserlocalUser"  from "GlobUserLocalUser"
            join "GlobUserLocalUserGroup" GULUG on "GlobUserLocalUser"."IDglobUserlocalUser" = GULUG."IDglobUserlocalUser"
            where GULUG."IDgroup"=:IDgroup and "IDglobUser"=:IDglobUser
        ');


        $groupCookie = json_decode($_COOKIE['group'],true);
        $IDgroup = $groupCookie['groupID'];

        $globUserCookie = json_decode($_COOKIE['globUser'],true);
        $IDglobUser=$globUserCookie['IDglobUser'];



        $stmt->bindParam(':IDglobUser', $IDglobUser);
        $stmt->bindParam(':IDgroup', $IDgroup);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result == false) {
            throw new InvalidArgumentException("There is no globUserLocalUser!");
        }

        return $result['IDglobUserlocalUser'];


    }

    public function getIDglobUserLocalUserViaGroupID($groupID)
    {

        $stmt = $this->database->connect()->prepare('
            SELECT "GlobUserLocalUser"."IDglobUserlocalUser" as "IDglobUserlocalUser"  from "GlobUserLocalUser"
            join "GlobUserLocalUserGroup" GULUG on "GlobUserLocalUser"."IDglobUserlocalUser" = GULUG."IDglobUserlocalUser"
            where GULUG."IDgroup"=:IDgroup and "IDglobUser"=:IDglobUser
        ');



        $globUserCookie = json_decode($_COOKIE['globUser'],true);
        $IDglobUser=$globUserCookie['IDglobUser'];



        $stmt->bindParam(':IDglobUser', $IDglobUser);
        $stmt->bindParam(':IDgroup', $groupID);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result == false) {
            throw new InvalidArgumentException("There is no globUserLocalUser!");
        }

        return $result['IDglobUserlocalUser'];


    }

    public function refreshIDglobUserLocalUserCookie($groupID){
        $cookie_name = "IDGlobUserLocalUser";
        $cookieValue['IDGlobUserLocalUser']=$this->getIDglobUserLocalUserViaGroupID($groupID);
        $cookie_value = json_encode($cookieValue);
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    }

    public function getGlobUserGroups(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT   "groupName", "groupPassword", "groupSalt", G."IDgroup"  from "GlobUserLocalUserGroup"
            join "Group" G on "GlobUserLocalUserGroup"."IDgroup" = G."IDgroup"
            join "GlobUserLocalUser" GULU on GULU."IDglobUserlocalUser" = "GlobUserLocalUserGroup"."IDglobUserlocalUser"
            WHERE GULU."IDglobUser" =:IDglobUser
        ');


        $globUserWithIDArray = json_decode($_COOKIE['globUser'], true);

        $stmt->bindParam(':IDglobUser', $globUserWithIDArray['IDglobUser'], PDO::PARAM_INT);

        $stmt->execute();

        $globUserGroups = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($globUserGroups as $globUserGroup) {
            $result[] = new Group(
                $globUserGroup['groupName'],
                $globUserGroup['groupPassword'],
                $globUserGroup['groupSalt'],
                $globUserGroup['IDgroup']
            );
        }

        return $result;
    }

    public function getGlobUserGroupByName(string $groupName): Group
    {
        $result = null;

        $stmt = $this->database->connect()->prepare('
            SELECT   "groupName", "groupPassword", "groupSalt", G."IDgroup"  from "GlobUserLocalUserGroup"
            join "Group" G on "GlobUserLocalUserGroup"."IDgroup" = G."IDgroup"
            join "GlobUserLocalUser" GULU on GULU."IDglobUserlocalUser" = "GlobUserLocalUserGroup"."IDglobUserlocalUser"
            WHERE GULU."IDglobUser" =:IDglobUser AND WHERE G."groupName" == :groupName
        ');


        $globUserWithIDArray = json_decode($_COOKIE['globUser'], true);

        $stmt->bindParam(':groupName', $groupName);

        $stmt->bindParam(':IDglobUser', $globUserWithIDArray['IDglobUser'], PDO::PARAM_INT);

        $stmt->execute();

        $globUserGroup = $stmt->fetch(PDO::FETCH_ASSOC);

        $result = new Group(
            $globUserGroup['groupName'],
            $globUserGroup['groupPassword'],
            $globUserGroup['groupSalt'],
            $globUserGroup['IDgroup']
        );

        return $result;
    }

    public function getGroupByGroupID(int $groupID): Group
    {

        $stmt = $this->database->connect()->prepare('
            SELECT * from "Group"
            WHERE "IDgroup" = :IDgroup;
        ');

        $stmt->bindParam(':IDgroup', $groupID, PDO::PARAM_INT);

        $stmt->execute();

        $group = $stmt->fetch(PDO::FETCH_ASSOC);

        return new Group(
            $group['groupName'],
            $group['groupPassword'],
            $group['groupSalt'],
            $group['IDgroup']
        );
    }

    public function refreshGroupCookie(int $groupID){
        $group = $this->getGroupByGroupID($groupID);

        $cookie_name = "group";
        $groupValue['groupName']=$group->getGroupName();
        $groupValue['groupID']=$group->getIDgroup();
        $cookie_value = json_encode($groupValue);
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    }


    public function getGlobUserGroupsByGroupName(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
                     SELECT G."IDgroup" as "IDgroup", "groupName", GULU."IDglobUserlocalUser" from "GlobUserLocalUserGroup"
                    join "Group" G on "GlobUserLocalUserGroup"."IDgroup" = G."IDgroup"
                    join "GlobUserLocalUser" GULU on GULU."IDglobUserlocalUser" = "GlobUserLocalUserGroup"."IDglobUserlocalUser"
                    WHERE G."groupName" LIKE :groupName 
                      AND GULU."IDglobUser" = :IDglobUser
        ');

        $globUserWithIDArray = json_decode($_COOKIE['globUser'], true);
        $stmt->bindParam(':groupName', $searchString);
        $stmt->bindParam(':IDglobUser', $globUserWithIDArray['IDglobUser'], PDO::PARAM_INT);

        $stmt->execute();


        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

}