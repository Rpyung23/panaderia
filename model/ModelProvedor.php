<?php

if (is_file('conn/conn.php'))
{
    require('conn/conn.php');
}else{
    require('../conn/conn.php');
}

if (is_file('poo/cProvedor.php'))
{
    require('poo/cProvedor.php');
}else{
    require('../poo/cProvedor.php');
}

$objProvedores = [];

function createProvedorModel($objPro)
{
    $conn = Conn();


    $nombre = $objPro->getNombre();
    $telefono = $objPro->getTelefono();
    $direcc = $objPro->getDirecc();
    $email = $objPro->getEmail();
    $encargado = $objPro->getEncargado();
    $code = $objPro->getCodigo();

    $query = "insert into proveedores(cod_proveedor,nombre, telefono, direcc, email,encargado,activo)
            values ('$code','$nombre','$telefono','$direcc','$email','$encargado','1')";

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
function readProvedorModel()
{
    $conn = Conn();
    $query = "select * from proveedores where activo = 1";
    $resultado = mysqli_query($conn,$query);

    if (mysqli_num_rows($resultado)>0)
    {

        while ($obj = mysqli_fetch_array($resultado))
        {
            $objPro = new cProvedor();
            $objPro->setCodigo($obj['cod_proveedor']);
            $objPro->setTelefono($obj['telefono']);
            $objPro->setEncargado($obj['encargado']);
            $objPro->setEmail($obj['email']);
            $objPro->setDirecc($obj['direcc']);
            $objPro->setNombre($obj['nombre']);
            $objProvedores[] = $objPro;
        }
        return $objProvedores;
    }else{
        return $objProvedores;
    }
}

function updateProvedorModel($objPro)
{
    $conn = Conn();

    $cod_proveedor_aux = $objPro->getCodigoAux();
    $nombre = $objPro->getNombre();
    $telefono = $objPro->getTelefono();
    $direcc = $objPro->getDirecc();
    $email = $objPro->getEmail();
    $encargado = $objPro->getEncargado();
    $code = $objPro->getCodigo();

    $query = "update proveedores set cod_proveedor = '$code',nombre = '$nombre', telefono = '$telefono'
                     , direcc = '$direcc', email = '$email'
                     ,encargado = '$encargado' where cod_proveedor = '$cod_proveedor_aux'";
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
function deleteProvedorModel($codePro)
{
    $conn = Conn();
    $query = "update proveedores set activo = 0 where cod_proveedor = '$codePro'";
    //echo $query;

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
