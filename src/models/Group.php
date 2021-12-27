<?php

class Group
{
    private string $groupName;
    private string $groupPassword;
    private string $groupSalt;
     private $IDgroup;

    /**
     * @param int|null $IDgroup
     * @param string $groupName
     * @param string $groupPassword
     */
    public function __construct(string $groupName, string $groupPassword, string $groupSalt, $IDgroup = null)
    {
        $this->groupName = $groupName;
        $this->groupPassword = $groupPassword;
        $this->groupSalt = $groupSalt;
        $this->IDgroup = $IDgroup;
    }



    public function getIDgroup():int
    {
        return $this->IDgroup;
    }


    public function setIDgroup(int $IDgroup): void
    {
        $this->IDgroup = $IDgroup;
    }



    /**
     * @return string
     */
    public function getGroupName(): string
    {
        return $this->groupName;
    }

    /**
     * @param string $groupName
     */
    public function setGroupName(string $groupName): void
    {
        $this->groupName = $groupName;
    }

    /**
     * @return string
     */
    public function getGroupPassword(): string
    {
        return $this->groupPassword;
    }

    /**
     * @param string $groupPassword
     */
    public function setGroupPassword(string $groupPassword): void
    {
        $this->groupPassword = $groupPassword;
    }

    /**
     * @return string
     */
    public function getGroupSalt(): string
    {
        return $this->groupSalt;
    }

    /**
     * @param string $groupSalt
     */
    public function setGroupSalt(string $groupSalt): void
    {
        $this->groupSalt = $groupSalt;
    }


}