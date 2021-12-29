<?php
require_once 'AppController.php';
require_once __DIR__ . "/../models/Event.php";
require_once __DIR__ . '/../repository/EventRepository.php';


class EventController extends AppController
{
    private EventRepository $eventRepository;

    public function __construct()
    {
        $this->eventRepository = new EventRepository();
    }


    public function main()
    {
        $events = $this->eventRepository->getEventsInCurrentGroupNotBelongingToUser();
        $this->render('main', ['events' => $events]);
    }

   public function chosen()
    {
        $events = $this->eventRepository->getEventsInCurrentGroupBelongingToUser();
        $this->render('chosen', ['events' => $events]);
    }

    public function calendar()
    {
        $events = $this->eventRepository->getEventsInCurrentGroup();
        $this->render('calendar', ['events' => $events]);
    }

    public function createEvent()
    {


        $eventDescription = $_POST["eventDescription"];
        $eventLocation = $_POST["eventLocation"];
        $date = strtotime($_POST["date"]); //	Thu Dec 30 2021 00:00:00 GMT+0000

        $time = strtotime($_POST["time"]);

        $hours = gmdate('H', $time);
        $minutes = gmdate('i', $time);


        $hoursToBeSubtracted = 0;
        $minutesToBeSubtracted = 0;

        if (isset($_POST["deadlineTime"])) {

            $deadlineTime = $_POST["deadlineTime"];
            $hoursToBeSubtracted = gmdate('H', strtotime($deadlineTime));
            $minutesToBeSubtracted = gmdate('i', strtotime($deadlineTime));

        }

        $fullHours = $hours - $hoursToBeSubtracted;
        $fullMinutes = $minutes - $minutesToBeSubtracted;

        $full = $date + $fullHours*3600 + $fullMinutes * 60;

//        die();
        $eventToCreate = new Event($eventDescription, $eventLocation, $full);

        $this->eventRepository->createEvent($eventToCreate);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/chosen");

    }

    public function addEvent(int $id){
        http_response_code(200);
        $this->eventRepository->generateGlobUserLocalUserGroupEventConnection($id);
    }


}
