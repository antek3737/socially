<?php

class LocalUser
{
    private int $IDlocalUser;
    private int $IDglobUserlocalUser;
    private string $localName;
    private string $localDescription;
    private string $localPhoto;

    /**

     * @param string $localName
     * @param string $localDescription
     * @param string $localPhoto
     */
    public function __construct( string $localName, string $localDescription, string $localPhoto)
    {
        $this->localName = $localName;
        $this->localDescription = $localDescription;
        $this->localPhoto = $localPhoto;
    }


    /**
     * @return string
     */
    public function getLocalName(): string
    {
        return $this->localName;
    }

    /**
     * @param string $localName
     */
    public function setLocalName(string $localName): void
    {
        $this->localName = $localName;
    }

    /**
     * @return string
     */
    public function getLocalDescription(): string
    {
        return $this->localDescription;
    }

    /**
     * @param string $localDescription
     */
    public function setLocalDescription(string $localDescription): void
    {
        $this->localDescription = $localDescription;
    }

    /**
     * @return string
     */
    public function getLocalPhoto(): string
    {
        return $this->localPhoto;
    }

    /**
     * @param string $localPhoto
     */
    public function setLocalPhoto(string $localPhoto): void
    {
        $this->localPhoto = $localPhoto;
    }




}