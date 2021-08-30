<?php

if (is_file('model/ModelProducto.php'))
{
    require('model/ModelProducto.php');
}else{
    require('../model/ModelProducto.php');
}

function readProductosController()
{
    $datos = readProductosModel();
    //var_dump($datos);
    return $datos;
}

function insertProducto($json)
{
    $objPro = new cProducto();
    $objPro->setNombre($json['name']);
    $objPro->setPrecio($json['precio']);
    $objPro->setDescripcion($json['desc']);
    $objPro->setFoto($json['foto']);
    return createProductoModel($objPro);
}


function updateProductoControler($json)
{
    return updateProductoModel($json);
}

function deleteProductoControler($json)
{
    $objPro = new cProducto();
    $objPro->setCodProducto($json['code']);
    return deleteProductoModel($objPro->getCodProducto());
}


//readProductosController();


?>