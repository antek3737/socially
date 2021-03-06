<?php

require_once 'Repository.php';
//require_once 'GroupRepository.php';
require_once __DIR__ . '/../models/Event.php';

class EventRepository extends Repository
{


    public function createEvent(Event $event)
    {
        include 'public/views/createUserViaCookie.php';

        $stmt = $this->database->connect()->prepare('
           INSERT INTO public."Event" ("eventDescription", "eventLocation", "eventPhoto","eventTime")
           VALUES(?,?,?,to_timestamp(?)) RETURNING "IDevent"
        ');

        $stmt->execute(
            [
                $event->getEventDescription(),
                $event->getEventLocation(),
                $avatar,
                $event->getEventTime()
            ]
        );

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $IDevent = $result['IDevent'];
        $this->generateGlobUserLocalUserGroupEventConnection($IDevent);

    }


    public function generateGlobUserLocalUserGroupEventConnection($IDevent)
    {

        $groupRepository = new GroupRepository();
        $IDGlobUserLocalUserGroup = $groupRepository->getCurrentIDglobUserlocalUsergroup();

        $stmt = $this->database->connect()->prepare('
           INSERT INTO public."GlobUserLocalUserGroupEvent" ("IDglobUserlocalUsergroup", "IDevent")
           VALUES(?,?)
        ');

        $stmt->execute([$IDGlobUserLocalUserGroup, $IDevent]);
    }

    public function unconnectGlobUserLocalUserGroupEventConnection($IDevent)
    {

        $groupRepository = new GroupRepository();
        $IDGlobUserLocalUserGroup = $groupRepository->getCurrentIDglobUserlocalUsergroup();

        $stmt = $this->database->connect()->prepare('
            DELETE FROM "GlobUserLocalUserGroupEvent"
            where "IDevent"=:IDevent and "IDglobUserlocalUsergroup" =:IDglobUserlocalUsergroup;
        ');

        $stmt->bindParam(':IDevent', $IDevent, PDO::PARAM_INT);
        $stmt->bindParam(':IDglobUserlocalUsergroup', $IDGlobUserLocalUserGroup, PDO::PARAM_INT);

        $stmt->execute();
    }


    public function getEventsInCurrentGroup(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT E."IDevent" ,"eventDescription","eventLocation","eventPhoto","eventTime" from "GlobUserLocalUserGroupEvent"
            join "Event" E on "GlobUserLocalUserGroupEvent"."IDevent" = E."IDevent"
            join "GlobUserLocalUserGroup" GULUG on "GlobUserLocalUserGroupEvent"."IDglobUserlocalUsergroup" = GULUG."IDglobUserlocalUsergroup"
            where "IDgroup" =:IDgroup ORDER BY "eventTime";
        ');


        $groupCookie = json_decode($_COOKIE['group'], true);

        $stmt->bindParam(':IDgroup', $groupCookie['groupID'], PDO::PARAM_INT);

        $stmt->execute();

        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($events as $event) {
            $temp = new Event(
                $event['eventDescription'],
                $event['eventLocation'],
                $event['eventTime'],
            );

            $temp->setEventPhoto($event['eventPhoto']);
            $temp->setIDevent($event['IDevent']);

            $result[] = $temp;
        }

        return $result;
    }
    public function getEventsInCurrentGroupNotBelongingToUser(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
                SELECT E."IDevent", "eventDescription", "eventLocation", "eventPhoto", "eventTime"
                from "GlobUserLocalUserGroupEvent"
                join "Event" E on "GlobUserLocalUserGroupEvent"."IDevent" = E."IDevent"
                join "GlobUserLocalUserGroup" GULUG    on "GlobUserLocalUserGroupEvent"."IDglobUserlocalUsergroup" = GULUG."IDglobUserlocalUsergroup"
                where "IDgroup" = :IDgroup and "GlobUserLocalUserGroupEvent"."IDglobUserlocalUsergroup" != :IDglobUserlocalUsergroup
                    EXCEPT SELECT E."IDevent", "eventDescription", "eventLocation", "eventPhoto", "eventTime"
                    from "GlobUserLocalUserGroupEvent"
                    join "Event" E on "GlobUserLocalUserGroupEvent"."IDevent" = E."IDevent"
                    join "GlobUserLocalUserGroup" GULUG    on "GlobUserLocalUserGroupEvent"."IDglobUserlocalUsergroup" = GULUG."IDglobUserlocalUsergroup"
                    where "IDgroup" = :IDgroup and "GlobUserLocalUserGroupEvent"."IDglobUserlocalUsergroup" = :IDglobUserlocalUsergroup ORDER BY "eventTime";
        ');


        $groupCookie = json_decode($_COOKIE['group'], true);

        $stmt->bindParam(':IDgroup', $groupCookie['groupID'], PDO::PARAM_INT);

        $groupRepository = new GroupRepository();
        $IDGlobUserLocalUserGroup = $groupRepository->getCurrentIDglobUserlocalUsergroup();

        $stmt->bindParam(':IDglobUserlocalUsergroup', $IDGlobUserLocalUserGroup, PDO::PARAM_INT);

        $stmt->execute();

        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($events as $event) {
            $temp = new Event(
                $event['eventDescription'],
                $event['eventLocation'],
                $event['eventTime'],
            );

            $temp->setEventPhoto($event['eventPhoto']);
            $temp->setIDevent($event['IDevent']);


            $result[] = $temp;
        }

        return $result;
    }

    public function getEventsInCurrentGroupBelongingToUser(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
                      SELECT E."IDevent", "eventDescription", "eventLocation", "eventPhoto", "eventTime"
                      from "GlobUserLocalUserGroupEvent"
                      join "Event" E on "GlobUserLocalUserGroupEvent"."IDevent" = E."IDevent"
                      join "GlobUserLocalUserGroup" GULUG    on "GlobUserLocalUserGroupEvent"."IDglobUserlocalUsergroup" = GULUG."IDglobUserlocalUsergroup"
                      where "IDgroup" = :IDgroup and "GlobUserLocalUserGroupEvent"."IDglobUserlocalUsergroup" = :IDglobUserlocalUsergroup ORDER BY "eventTime";
        ');


        $groupCookie = json_decode($_COOKIE['group'], true);

        $stmt->bindParam(':IDgroup', $groupCookie['groupID'], PDO::PARAM_INT);

        $groupRepository = new GroupRepository();
        $IDGlobUserLocalUserGroup = $groupRepository->getCurrentIDglobUserlocalUsergroup();

        $stmt->bindParam(':IDglobUserlocalUsergroup', $IDGlobUserLocalUserGroup, PDO::PARAM_INT);

        $stmt->execute();

        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($events as $event) {
            $temp = new Event(
                $event['eventDescription'],
                $event['eventLocation'],
                $event['eventTime'],
            );

            $temp->setEventPhoto($event['eventPhoto']);
            $temp->setIDevent($event['IDevent']);


            $result[] = $temp;
        }

        return $result;
    }


}