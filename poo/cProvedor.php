<?php

class cProvedor
{
    private $codigo;
    private $codigoAux;
    private $nombre;
    private $telefono;
    private $direcc;
    private $email;
    private $encargado;

    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getCodigoAux()
    {
        return $this->codigoAux;
    }

    /**
     * @param mixed $codigoAux
     */
    public function setCodigoAux($codigoAux)
    {
        $this->codigoAux = $codigoAux;
    }

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getDirecc()
    {
        return $this->direcc;
    }

    /**
     * @param mixed $direcc
     */
    public function setDirecc($direcc)
    {
        $this->direcc = $direcc;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEncargado()
    {
        return $this->encargado;
    }

    /**
     * @param mixed $encargado
     */
    public function setEncargado($encargado)
    {
        $this->encargado = $encargado;
    }


}
?>