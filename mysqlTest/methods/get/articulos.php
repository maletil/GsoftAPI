<?php
/**
 * Created by PhpStorm.
 * User: maletil
 * Date: 15/08/17
 * Time: 18:37
 */

require ('../../functions/functions.php');

if (isset($_GET["auth"]) && isset($_GET["name"]) && isset($_GET["getPrice"])){
$auth = $_GET["auth"];
$name = $_GET["name"];
$getPrice = $_GET["getPrice"];
$orderBy = "";
    if (isset($_GET["orderBy"])) {
        $orderBy = $_GET["orderBy"];
    }

    switch ($orderBy) {
        case "Nombre":
            $orderTable = "`articulos`.`Descripcion`";
        break;
        case "Familia":
            $orderTable = "SUBSTR(`articulos`.`Codigo`, 1, 2)";
        break;
        default:
            $orderTable = "`articulos`.`Descripcion`";
        break;
    }


    if ($getPrice == "true") {
        $output = "SELECT articulos.Contador, articulos.Codigo, Descripcion, `Precio Medio`, `Ultimo Precio` , `Ultima Modificacion` FROM articulos INNER JOIN articulos2 ON `articulos`.`Codigo` = `articulos2`.`Codigo` WHERE articulos.Descripcion LIKE '%" . $name . "%' ORDER BY ". $orderTable ." ASC";
    } else if ($getPrice == "false") {
        $output = "SELECT Contador, Codigo, Nombre, Descripcion, `Ultima Modificacion` FROM articulos WHERE Descripcion LIKE '%" . $name . "%' ORDER BY ". $orderTable ." ASC";
    }
    header('Content-Type: application/json');
    echo sqlRequest($output, $auth);
}