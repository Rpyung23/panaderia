<?php

if (is_file('conn/conn.php'))
{
    require('conn/conn.php');
}else{
    require('../conn/conn.php');
}

if (is_file('poo/cVenta.php'))
{
    require('poo/cVenta.php');
}else{
    require('../poo/cVenta.php');
}

$objcVentas = [];

function createVentaModel($objVents)
{
    $conn = Conn();

    mysqli_begin_transaction($conn,MYSQLI_TRANS_START_READ_WRITE);
    mysqli_autocommit($conn,false);

    try {

        $quey_user = "select  max(cod_usuario) as cod_usuario from usuarios";
        $resultado_user = mysqli_query($conn,$quey_user);
        $resultado_user_obj = mysqli_fetch_array($resultado_user);
        $code_user = $resultado_user_obj['cod_usuario'];



        $dni = $objVents->getDniCliente();
        $names = $objVents->getNombres();
        $preciotot = $objVents->getPrecioTotFactura();


        $query = "insert into factura(fk_cod_usuario, dni_cliente, nombres, precio_tot, fecha_venta)
            values ('$code_user','$dni','$names','$preciotot',CURRENT_TIME())";

        mysqli_query($conn,$query);

        $quey_sel = "select  max(id_factura) as id_factura from factura";
        $resultado = mysqli_query($conn,$quey_sel);

        $resultado_ = mysqli_fetch_array($resultado);

        $code = $resultado_['id_factura'];

        for ($i=0;$i<sizeof($objVents->getDetalleVentas());$i++)
        {
            $id_pro = $objVents->getDetalleVentas()[$i]->getIdProducto();
            $cant = $objVents->getDetalleVentas()[$i]->getCantidad();
            $precio = $objVents->getDetalleVentas()[$i]->getPrecio();

            $query_ = "insert into detalle_venta(fk_id_factura, id_producto, cantidad, precio)
            values('$code','$id_pro','$cant','$precio');";

            mysqli_query($conn,$query_);
        }

        mysqli_commit($conn);
        mysqli_close($conn);
        return true;

    }catch (Exception $e)
    {
        echo $e;
        mysqli_rollback($conn);
        mysqli_close($conn);
        return false;
    }
}
/*function readVentaModel()
{
    $conn = Conn();
    $query = "select * from producto where active = 1;";
    $resultado = mysqli_query($conn,$query);

    if (mysqli_num_rows($resultado)>0)
    {

        while ($obj = mysqli_fetch_array($resultado))
        {
            $objPro = new cVenta();
            $objPro->setCodProducto($obj['cod_producto']);
            $objPro->setDescripcion($obj['descripcion']);
            $objPro->setFoto($obj['foto']);
            $objPro->setNombre($obj['nombre']);
            $objPro->setPrecio($obj['precio']);
            $objPro->setActive($obj['active']);
            $objcVentas[] = $objPro;
        }
        return $objcVentas;
    }else{
        return $objcVentas;
    }
}*/
function readVentasFechasModel($fechaI,$fechaF){}

//createVentaModel(0)


?>
