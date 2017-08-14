<?php
/**
 * Created by PhpStorm.
 * User: maletil
 * Date: 12/08/17
 * Time: 20:12
 */


function mostrar($peticion) {
    if (isset($_GET["$peticion"])) {
        $resultado = $_GET["$peticion"];
        echo $resultado;
        echo "<br>";
    }
}

function mostrarConNombre($peticion) {
    if (isset($_GET["$peticion"])) {
        $resultado = $_GET["$peticion"];
        echo "$" . $peticion . ": " . $resultado;
        echo "<br>";
    }
}
