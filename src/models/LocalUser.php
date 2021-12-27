<?php

class LocalUser
{
    private int $IDlocalUser;
    private int $IDglobUserlocalUser;
    private  $localName;
    private  $localDescription;
    private  $localPhoto;

    /**

     * @param string $localName
     * @param string $localDescription
     * @param string $localPhoto
     */
    public function __construct(  $localName,  $localDescription,  $localPhoto)
    {
        $this->localName = $localName;
        $this->localDescription = $localDescription;
        $this->localPhoto = $localPhoto;
    }

    /**
     * @return int
     */
    public function getIDlocalUser(): int
    {
        return $this->IDlocalUser;
    }

    /**
     * @param int $IDlocalUser
     */
    public function setIDlocalUser(int $IDlocalUser): void
    {
        $this->IDlocalUser = $IDlocalUser;
    }

    /**
     * @return int
     */
    public function getIDglobUserlocalUser(): int
    {
        return $this->IDglobUserlocalUser;
    }

    /**
     * @param int $IDglobUserlocalUser
     */
    public function setIDglobUserlocalUser(int $IDglobUserlocalUser): void
    {
        $this->IDglobUserlocalUser = $IDglobUserlocalUser;
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