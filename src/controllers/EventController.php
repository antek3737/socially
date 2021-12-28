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
        $events = $this->eventRepository->getEventsInCurrentGroup();
        $this->render('main', ['events' => $events]);
    }

    public function createEvent()
    {


        $eventDescription = $_POST["eventDescription"];
        $eventLocation = $_POST["eventLocation"];

        $date = strtotime($_POST["date"]);

        $time = strtotime($_POST["time"]);

        $full = $date+$time;



        if (isset($_POST["deadlineTime"])) {
            $deadlineTime = $_POST["deadlineTime"];
            $deadlineTime = strtotime($deadlineTime);
            $full = $full - $deadlineTime;
        }

        $eventToCreate = new Event($eventDescription, $eventLocation, $full);
        $eventToCreate->setEventPhoto('lewak.jpg');

        $this->eventRepository->createEvent($eventToCreate);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/chosen");

    }


}
