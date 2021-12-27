<?php

class Event
{
    private string $eventDescription;
    private string $eventLocation;
    private string $eventTime;
    private string $eventDate;
    private string $eventPhoto;

    /**
     * @param string $eventDescription
     * @param string $eventLocation
     * @param $eventTime
     * @param $eventDate
     * @param string $eventPhoto
     */
    public function __construct(string $eventDescription, string $eventLocation, $eventTime, $eventDate, string $eventPhoto)
    {
        $this->eventDescription = $eventDescription;
        $this->eventLocation = $eventLocation;
        $this->eventTime = $eventTime;
        $this->eventDate = $eventDate;
        $this->eventPhoto = $eventPhoto;
    }

    /**
     * @return string
     */
    public function getEventDescription(): string
    {
        return $this->eventDescription;
    }

    /**
     * @param string $eventDescription
     */
    public function setEventDescription(string $eventDescription): void
    {
        $this->eventDescription = $eventDescription;
    }

    /**
     * @return string
     */
    public function getEventLocation(): string
    {
        return $this->eventLocation;
    }

    /**
     * @param string $eventLocation
     */
    public function setEventLocation(string $eventLocation): void
    {
        $this->eventLocation = $eventLocation;
    }

    /**
     * @return mixed
     */
    public function getEventTime()
    {
        return $this->eventTime;
    }

    /**
     * @param mixed $eventTime
     */
    public function setEventTime($eventTime): void
    {
        $this->eventTime = $eventTime;
    }

    /**
     * @return mixed
     */
    public function getEventDate()
    {
        return $this->eventDate;
    }

    /**
     * @param mixed $eventDate
     */
    public function setEventDate($eventDate): void
    {
        $this->eventDate = $eventDate;
    }

    /**
     * @return string
     */
    public function getEventPhoto(): string
    {
        return $this->eventPhoto;
    }

    /**
     * @param string $eventPhoto
     */
    public function setEventPhoto(string $eventPhoto): void
    {
        $this->eventPhoto = $eventPhoto;
    }




}

