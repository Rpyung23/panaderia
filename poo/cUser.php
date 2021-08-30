<?php

class  cUser
{
    private $user;
    private $names;
    private $pass;

    public function __construct()
    {
        $this->user = null;
        $this->pass = null;
        $this->names = null;
    }

    /**
     * @return null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param null $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return null
     */
    public function getNames()
    {
        return $this->names;
    }

    /**
     * @param null $names
     */
    public function setNames($names)
    {
        $this->names = $names;
    }

    /**
     * @return null
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param null $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }




}

?>
