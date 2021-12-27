<?php

class GlobUser
{
    private string $globName;
    private string $globPhoneNumber;
    private string $globEmail;
    private string $globPassword;
    private string $globSalt;
    private string $globPhoto;

    /**
     * @param string $globName
     * @param string $globPhoneNumber
     * @param string $globEmail
     * @param string $globPassword
     * @param string $globSalt
     * @param string $globPhoto
     */
    public function __construct(string $globName, string $globPhoneNumber, string $globEmail, string $globPassword, string $globSalt, string $globPhoto)
    {
        $this->globName = $globName;
        $this->globPhoneNumber = $globPhoneNumber;
        $this->globEmail = $globEmail;
        $this->globPassword = $globPassword;
        $this->globSalt = $globSalt;
        $this->globPhoto = $globPhoto;
    }

    /**
     * @return string
     */
    public function getGlobName(): string
    {
        return $this->globName;
    }

    /**
     * @param string $globName
     */
    public function setGlobName(string $globName): void
    {
        $this->globName = $globName;
    }

    /**
     * @return string
     */
    public function getGlobPhoneNumber(): string
    {
        return $this->globPhoneNumber;
    }

    /**
     * @param string $globPhoneNumber
     */
    public function setGlobPhoneNumber(string $globPhoneNumber): void
    {
        $this->globPhoneNumber = $globPhoneNumber;
    }

    /**
     * @return string
     */
    public function getGlobEmail(): string
    {
        return $this->globEmail;
    }

    /**
     * @param string $globEmail
     */
    public function setGlobEmail(string $globEmail): void
    {
        $this->globEmail = $globEmail;
    }

    /**
     * @return string
     */
    public function getGlobPassword(): string
    {
        return $this->globPassword;
    }

    /**
     * @param string $globPassword
     */
    public function setGlobPassword(string $globPassword): void
    {
        $this->globPassword = $globPassword;
    }

    /**
     * @return string
     */
    public function getGlobSalt(): string
    {
        return $this->globSalt;
    }

    /**
     * @param string $globSalt
     */
    public function setGlobSalt(string $globSalt): void
    {
        $this->globSalt = $globSalt;
    }

    /**
     * @return string
     */
    public function getGlobPhoto(): string
    {
        return $this->globPhoto;
    }

    /**
     * @param string $globPhoto
     */
    public function setGlobPhoto(string $globPhoto): void
    {
        $this->globPhoto = $globPhoto;
    }




}