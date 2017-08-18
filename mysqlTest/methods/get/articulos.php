<?php
/**
 * Created by PhpStorm.
 * User: maletil
 * Date: 15/08/17
 * Time: 18:37
 */

require ('../../index.php');

if (isset($_GET["auth"]) && isset($_GET["name"]) && isset($_GET["getPrice"])){
$auth = $_GET["auth"];
$name = $_GET["name"];
$getPrice = $_GET["getPrice"];

    if ($getPrice == "true") {
        $output = "SELECT articulos.Contador, articulos.Codigo, Descripcion, Familia, `Precio Medio`, `Ultimo Precio` , `Ultima Modificacion` FROM   articulos, articulos2 WHERE  articulos.Codigo = articulos2.Codigo AND articulos.Descripcion LIKE '%llave%'";
        apiRequest($output, $auth);
    } else if ($getPrice == "false") {
        $output = "SELECT Contador, Codigo, Nombre, Descripcion, Familia, `Ultima Modificacion` FROM articulos WHERE Descripcion LIKE '%" . $name . "%'";
        apiRequest($output, $auth);
    }
}