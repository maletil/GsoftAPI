<?php
/**
 * Created by PhpStorm.
 * User: maletil
 * Date: 15/08/17
 * Time: 9:55
 */

if (isset($_GET["auth"]) && isset($_GET["name"])) {

    $orderBy = "";
    $name = rawurlencode($_GET["name"]);
    $auth = $_GET["auth"];
    $getPrice = "false";

    if (isset($_GET["getPrice"])) {
            $getPrice = $_GET["getPrice"];
    }
    if (isset($_GET["orderBy"])) {
            $orderBy = $_GET["orderBy"];
            echo $orderBy;
    }


    $origin = "http://localhost/GsoftAPI-A/mysqlTest/methods/get/articulos.php?auth=". $auth ."&name=". $name ."&getPrice=". $getPrice ."&orderBy=". $orderBy;
echo $origin;
    $json_string = file_get_contents($origin);

    if (isset($json_string)) {
        $json_output = json_decode($json_string);
    } else {
        echo('No encontrado');
        $json_output = false;
    }

//var_dump($data);
    echo "<table cellspacing=\"0\">
           <tr class='banner'>
                <td><strong>Código</strong></td>
                <td><strong>Nombre</strong></td>
                <td><strong>Familia</strong></td>
                <td><strong>Últ. mod.</strong></td>
            </tr>";

    if ($json_output) {
        foreach ($json_output as $object):?>

            <tr class="content">
                <td><strong><?php echo $object->{'Codigo'} ?></strong></td>
                <td><strong><?php echo $object->{'Descripcion'} ?></strong></td>
                <td><strong><?php echo substr($object->{'Codigo'}, 0, 2) ?></strong></td>
                <td><strong><?php echo substr($object->{'Ultima Modificacion'}, 0, 10) ?></strong></td>
            </tr>

        <?php endforeach;
        echo "</table>";
    } else {echo "</table>"; echo ('No encontrado');}
}
?>

<style>
    td{
        padding-right:10px;
        padding-left: 13px;
        padding-top: 4px;
        font-family: Liberation Sans, Arial, monospace;
        font-size: 1rem;
        box-shadow: 1px 0 0 0 #406c52 inset;
    }
    .banner td {
        padding-top: 14px;
        padding-bottom: 12px;
        box-shadow: 1px 0 0 0 #35694a inset;
    }
    .banner{
        background-color: #0d9351;
        color: #f8f8f8;
    }
    .content {
        background-color: #c5d8c6b3;
        font-weight: 300;
        line-height: 1.5;
    }
    .content:nth-child(2n){
        background-color: #FFF;
    }
</style>
