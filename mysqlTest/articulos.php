<?php
/**
 * Created by PhpStorm.
 * User: maletil
 * Date: 14/08/17
 * Time: 17:38
 */
$Select_articulos = "Contador, Codigo, Nombre, Descripcion, Familia, `Ultima Modificacion`";

SELECT Contador, Codigo, Nombre, Descripcion, Familia, `Ultima Modificacion` FROM `articulos` WHERE Nombre like '%1/4%' AND Nombre LIKE '%machon%'