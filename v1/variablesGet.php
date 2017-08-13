<?php
/**
 * Created by PhpStorm.
 * User: maletil
 * Date: 12/08/17
 * Time: 20:12
 */


function Mostrar($peticion) {
    $resultado = $_GET["$peticion"];
    echo $resultado;
}