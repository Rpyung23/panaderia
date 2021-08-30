<?php

if (is_file('conn/conn.php'))
{
    require('conn/conn.php');
}else{
    require('../conn/conn.php');
}

if (is_file('poo/cProducto.php'))
{
    require('poo/cProducto.php');
}else{
    require('../poo/cProducto.php');
}

$objProductos = [];

function createProductoModel($objPro)
{
    $conn = Conn();


    $nombre = $objPro->getNombre();
    $foto = $objPro->getFoto();
    $des = $objPro->getDescripcion();
    $pre = $objPro->getPrecio();

    $query = "insert into producto(nombre, foto, descripcion, precio, active)
            values ('$nombre','$foto','$des','$pre',1)";

    mysqli_begin_transaction($conn,MYSQLI_TRANS_START_READ_WRITE);
    mysqli_autocommit($conn,false);

    try {
        $result = mysqli_query($conn,$query);
        mysqli_commit($conn);
        mysqli_close($conn);

        if ($result)
        {
            return true;
        }else{
            return false;
        }

    }catch (Exception $e)
    {
        //echo $e;
        mysqli_rollback($conn);
        mysqli_close($conn);
        return false;
    }
}
function readProductosModel()
{
    $conn = Conn();
    $query = "select * from producto where active = 1;";
    $resultado = mysqli_query($conn,$query);

    if (mysqli_num_rows($resultado)>0)
    {

        while ($obj = mysqli_fetch_array($resultado))
        {
            $objPro = new cProducto();
            $objPro->setCodProducto($obj['cod_producto']);
            $objPro->setDescripcion($obj['descripcion']);
            $objPro->setFoto($obj['foto']);
            $objPro->setNombre($obj['nombre']);
            $objPro->setPrecio($obj['precio']);
            $objPro->setActive($obj['active']);
            $objProductos[] = $objPro;
        }
        return $objProductos;
    }else{
        return $objProductos;
    }
}
function readProductodisponiblesModel(){}
function readProductosAgotadosModel()
{

}
function updateProductoModel($json)
{
    $conn = Conn();
    $codePro = $json['code'];
    $nombre = $json['name'];
    $foto = $json['foto'];
    $descripcion = $json['desc'];
    $precio = $json['precio'];
    $query = "update producto set nombre = '$nombre',foto='$foto',descripcion='$descripcion'
                  ,precio='$precio' where cod_producto = '$codePro'";

    mysqli_begin_transaction($conn,MYSQLI_TRANS_START_READ_WRITE);
    mysqli_autocommit($conn,false);

    try {
        mysqli_query($conn,$query);
        mysqli_commit($conn);
        return true;
    }catch (Exception $e)
    {
        mysqli_rollback($conn);
        return false;
    }
}
function deleteProductoModel($codePro)
{
    $conn = Conn();
    $query = "update producto set active = 0 where cod_producto = '$codePro'";

    mysqli_begin_transaction($conn,MYSQLI_TRANS_START_READ_WRITE);
    mysqli_autocommit($conn,false);

    try {
        mysqli_query($conn,$query);
        mysqli_commit($conn);
        return true;
    }catch (Exception $e)
    {
        mysqli_rollback($conn);
        return false;
    }
}


?>
