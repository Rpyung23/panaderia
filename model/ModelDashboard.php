<?php

if (is_file('conn/conn.php'))
{
    require('conn/conn.php');
}else{
    require('../conn/conn.php');
}



function readDashboardModel()
{
    $conn = Conn();
    $query_ventas = "select SUM(F.precio_tot) as tot from factura as F";
    $query_prov = "select count(*) as cantidad from proveedores";
    $query_prod = "select count(*) as cantidad from producto";

    $resultado_v = mysqli_query($conn,$query_ventas);
    $resultado_prov = mysqli_query($conn,$query_prov);
    $resultado_prod = mysqli_query($conn,$query_prod);

    $venta = mysqli_fetch_array($resultado_v);
    $prov = mysqli_fetch_array($resultado_prov);
    $prod = mysqli_fetch_array($resultado_prod);


    $array_ = array("venta"=>$venta['tot']
    ,"proveedor"=>$prov['cantidad']
    ,"producto"=>$prod['cantidad']);

    mysqli_close($conn);

    return $array_;

    //var_dump($array_);
}

?>
