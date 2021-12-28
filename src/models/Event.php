<?php

class Event
{
    private string $eventDescription;
    private string $eventLocation;
    private string $eventPhoto;
    private  $eventTime;
    private int $IDevent;


    public function __construct(string $eventDescription, string $eventLocation, $eventTime)
    {
        $this->eventDescription = $eventDescription;
        $this->eventLocation = $eventLocation;
        $this->eventTime = $eventTime;
    }

    /**
     * @return int
     */
    public function getIDevent(): int
    {
        return $this->IDevent;
    }

    /**
     * @param int $IDevent
     */
    public function setIDevent(int $IDevent): void
    {
        $this->IDevent = $IDevent;
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




}

