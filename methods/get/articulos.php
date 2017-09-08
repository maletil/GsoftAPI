<?php
/**
 * Created by PhpStorm.
 * User: maletil
 * Date: 15/08/17
 * Time: 18:37
 */

require('../../functions/functions.php');

if (isset($_GET["auth"]) && isset($_GET["search"]) && isset($_GET["getPrice"])){
$auth = $_GET["auth"];
$search = $_GET["search"];
$getPrice = $_GET["getPrice"];
$orderBy = "";

    if (isset($_GET["orderBy"])) {
        $orderBy = $_GET["orderBy"];
    }
    if (isset($_GET["orderWord"])) {
        $orderWord = $_GET["orderWord"];
    } else {
        $orderWord = "undefined";
    }

    switch ($orderBy) {
        case "Nombre":
            $orderColumn = "`articulos`.`Descripcion`";
                if ($orderWord == "undefined"){ $orderWord = "ASC";}
        break;
        case "Familia":
            $orderColumn = "SUBSTR(`articulos`.`Codigo`, 1, 2)";
                if ($orderWord == "undefined"){ $orderWord = "ASC";}
        break;
        case "Fecha":
            $orderColumn = "`Ultima Modificacion`";
                if ($orderWord == "undefined"){ $orderWord = "DESC";}
        break;
        default:
            $orderColumn = "`articulos`.`Descripcion`";
            if ($orderWord == "undefined"){ $orderWord = "ASC";}
        break;
    }


    if (is_numeric($search)){
        if (strlen($search) == 2) {
            $whereField = "WHERE articulos.Familia =". $search; //Búsqueda por Familia
        }else {
        $whereField = "WHERE articulos.Codigo =". $search;
        }
    } else {
        $whereField = "WHERE articulos.Descripcion LIKE '%" . $search . "%'";
    }


    if ($getPrice == "true") {
        $output = "SELECT articulos.Contador, articulos.Codigo, Descripcion, `Precio Medio`, `Ultimo Precio` , `Ultima Modificacion` FROM articulos INNER JOIN articulos2 ON `articulos`.`Codigo` = `articulos2`.`Codigo` ". $whereField ." ORDER BY ". $orderColumn . " " .$orderWord;
    } else if ($getPrice == "false") {
        $output = "SELECT Contador, Codigo, Nombre, Descripcion, `Ultima Modificacion` FROM articulos ". $whereField ." ORDER BY ". $orderColumn. " " .$orderWord;
    }
    header('Content-Type: application/json');
    echo sqlRequest($output, $auth);
}