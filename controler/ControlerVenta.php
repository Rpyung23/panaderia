<?php

if (is_file('model/ModelVenta.php'))
{
    require('model/ModelVenta.php');
}else{
    require('../model/ModelVenta.php');
}

/*function readProductosController()
{
    $datos = readProductosModel();
    //var_dump($datos);
    return $datos;
}*/

function insertVentaControler($json)
{
    $objVenta = new cVenta();
    $objVentaDetalle = [];


    $objVenta->setCodeUser($json['user']);
    $objVenta->setDniCliente($json['dni_cliente']);
    $objVenta->setNombres($json['names']);
    $objVenta->setPrecioTotFactura($json['precioT']);

    foreach ($json['datos'] as $obj)
    {
        $objDV = new cVentaDetalle();
        $objDV->setIdProducto($obj['id_producto']);
        $objDV->setPrecio($obj['precio']);
        $objDV->setCantidad($obj['cantidad']);
        $objVentaDetalle[] = $objDV;
    }


    $objVenta->setDetalleVentas($objVentaDetalle);

    //var_dump($objVentaDetalle);

    return createVentaModel($objVenta);
}



?>