<?php
/**
 * Created by PhpStorm.
 * User: maletil
 * Date: 25/08/17
 * Time: 18:15
 */

require('../../functions/functions.php');

if (isset($_GET["auth"]) && isset($_GET["search"])){
    $auth = $_GET["auth"];
    $search = $_GET["search"];
    $orderBy = "";

    if (isset($_GET["orderBy"])) {
        $orderBy = $_GET["orderBy"];
    }

/*    switch ($orderBy) {
        case "Nombre":
            $orderTable = "`Nombre Fiscal`";
            break;
        case "Familia":
            $orderTable = "SUBSTR(`articulos`.`Codigo`, 1, 2)";
            break;
        default:
            $orderTable = "`articulos`.`Descripcion`";
            break;
    }*/

    if (is_numeric(substr($search, 0 ,3))){
        $whereField = "Telefono1 LIKE INSERT('". $search ."%',4,0,'-') OR Telefono2 LIKE INSERT('". $search ."%',4,0,'-')";
    } else {
        $whereField = "`Nombre Fiscal` LIKE '%" . $search . "%'";
    }

    $output = "SELECT clientes.Contador, Codigo, `Nombre Fiscal`, CIF, `C Postal`, `Poblacion`, Domicilio, Telefono1, Telefono2 FROM clientes INNER JOIN direcciones ON `direcciones`.`Cliente` = `clientes`.`Contador` WHERE Fiscal = TRUE AND ". $whereField ." ORDER BY `Nombre Fiscal` ASC";
    header('Content-Type: application/json');
    echo sqlRequest($output, $auth);
}