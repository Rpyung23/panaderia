<?php

if (is_file('model/ModelProvedor.php'))
{
    require('model/ModelProvedor.php');
}else{
    require('../model/ModelProvedor.php');
}

function readProvedoresController()
{
    $datos = readProvedorModel();
    //var_dump($datos);
    return $datos;
}

function insertProvedores($json)
{

    $objPro = new cProvedor();
    $objPro->setCodigo($json['code']);
    $objPro->setNombre($json['name']);
    $objPro->setDirecc($json['dir']);
    $objPro->setEmail($json['email']);
    $objPro->setEncargado($json['encargado']);
    $objPro->setTelefono($json['tele']);
    return createProvedorModel($objPro);
}

function updateProvedoresControler($json)
{

    $objPro = new cProvedor();
    $objPro->setCodigoAux($json['code_aux']);
    $objPro->setCodigo($json['code']);
    $objPro->setNombre($json['name']);
    $objPro->setDirecc($json['dir']);
    $objPro->setEmail($json['email']);
    $objPro->setEncargado($json['encargado']);
    $objPro->setTelefono($json['tele']);
    return updateProvedorModel($objPro);
}

function deleteProvedoresControler($json)
{
    $objPro = new cProvedor();
    $objPro->setCodigo($json['code']);
    return deleteProvedorModel($objPro->getCodigo());
}


//readProductosController();


?>