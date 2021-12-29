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



    public function getEventsInCurrentGroup(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT E."IDevent" ,"eventDescription","eventLocation","eventPhoto","eventTime" from "GlobUserLocalUserGroupEvent"
            join "Event" E on "GlobUserLocalUserGroupEvent"."IDevent" = E."IDevent"
            join "GlobUserLocalUserGroup" GULUG on "GlobUserLocalUserGroupEvent"."IDglobUserlocalUsergroup" = GULUG."IDglobUserlocalUsergroup"
            where "IDgroup" =:IDgroup;
        ');


        $groupCookie = json_decode($_COOKIE['group'], true);

        $stmt->bindParam(':IDgroup', $groupCookie['groupID'], PDO::PARAM_INT);

        $stmt->execute();

        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($events as $event) {
            $temp= new Event(
                $event['eventDescription'],
                $event['eventLocation'],
                $event['eventTime'],
            );

            $temp->setEventPhoto( $event['eventPhoto']);
            $temp->setIDevent($event['IDevent']);

            $result[] =$temp;
        }

        return $result;
    }


}