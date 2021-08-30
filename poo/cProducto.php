<?php

class cProducto
{
    private $cod_producto;
    private $nombre;
    private $foto;
    private $descripcion;
    private $precio;
    private $active;

    public function __construct()
    {
        $this->cod_producto = null;
        $this->nombre = null;
        $this->foto = null;
        $this->descripcion = null;
        $this->precio = null;
        $this->active = null;
    }

    /**
     * @return mixed
     */
    public function getCodProducto()
    {
        return $this->cod_producto;
    }

    /**
     * @param mixed $cod_producto
     */
    public function setCodProducto($cod_producto)
    {
        $this->cod_producto = $cod_producto;
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
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed $foto
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

}

?>