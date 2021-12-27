<?php
require_once 'AppController.php';


class EventController extends AppController
{
    public function createEvent()
    {
        $eventDescription = $_POST["eventDescription"];
        $eventLocation=$_POST["eventLocation"];
        $date=$_POST["date"];
        $deadlineTime=$_POST["deadlineTime"];
        $eventDeadlineModeOn = $_POST["eventDeadlineModeOn"];

        echo $eventDeadlineModeOn;
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/chosen");

    }


}
