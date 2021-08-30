<?php

function createSession($valor)
{
    session_start();
    $_SESSION["code_user"] = $valor;
}

function readSession()
{
    session_start();
    return $_SESSION["code_user"];
}

function deleteSession()
{
    session_start();
    unset($_SESSION["code_user"]);
}

?>
