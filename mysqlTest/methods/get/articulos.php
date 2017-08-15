<?php
/**
 * Created by PhpStorm.
 * User: maletil
 * Date: 15/08/17
 * Time: 18:37
 */

require ('../../index.php');

if (isset($_GET["auth"]) && isset($_GET["name"])){
$auth = $_GET["auth"];
$name = $_GET["name"];


$output = "SELECT Contador, Codigo, Nombre, Descripcion, Familia, `Ultima Modificacion` FROM articulos WHERE Nombre LIKE '%" . $name . "%'";
apiRequest($output, $auth);
}