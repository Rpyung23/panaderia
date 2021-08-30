<?php

if(file_exists('')){
    require ('poo/cVentaDetalle.php');
}else{
    require ('../poo/cVentaDetalle.php');
}

class cVenta
{
    private $code_venta;
    private $dni_cliente;
    private $nombres;
    private $precioTotFactura;
    private $code_user;
    private $detalleVentas = [];

    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getCodeUser()
    {
        return $this->code_user;
    }

    /**
     * @param mixed $code_user
     */
    public function setCodeUser($code_user)
    {
        $this->code_user = $code_user;
    }

    /**
     * @return mixed
     */
    public function getCodeVenta()
    {
        return $this->code_venta;
    }

    /**
     * @param mixed $code_venta
     */
    public function setCodeVenta($code_venta)
    {
        $this->code_venta = $code_venta;
    }

    /**
     * @return mixed
     */
    public function getDniCliente()
    {
        return $this->dni_cliente;
    }

    /**
     * @param mixed $dni_cliente
     */
    public function setDniCliente($dni_cliente)
    {
        $this->dni_cliente = $dni_cliente;
    }

    /**
     * @return mixed
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * @param mixed $nombres
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }

    /**
     * @return mixed
     */
    public function getPrecioTotFactura()
    {
        return $this->precioTotFactura;
    }

    /**
     * @param mixed $precioTotFactura
     */
    public function setPrecioTotFactura($precioTotFactura)
    {
        $this->precioTotFactura = $precioTotFactura;
    }

    /**
     * @return array
     */
    public function getDetalleVentas(): array
    {
        return $this->detalleVentas;
    }

    /**
     * @param array $detalleVentas
     */
    public function setDetalleVentas(array $detalleVentas)
    {
        $this->detalleVentas = $detalleVentas;
    }



}
?>