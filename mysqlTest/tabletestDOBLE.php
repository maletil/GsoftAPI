<?php
/**
 * Created by PhpStorm.
 * User: maletil
 * Date: 15/08/17
 * Time: 9:55
 */

if (isset($_GET["auth"]) && isset($_GET["name"])) {

    $origin = "http://localhost/GsoftAPI-A/mysqlTest/methods/get/articulos.php?name=". $_GET["name"] . "&auth=1&getPrice=true";

    $json_string = file_get_contents($origin);
    $json_output = json_decode($json_string);

//var_dump($data);
    echo "<table cellspacing=\"0\">
           <tr class='banner'>
                <td><strong>Contador</strong></td>
                <td><strong>Código</strong></td>
                <td><strong>Nombre</strong></td>
                <td><strong>Familia</strong></td>
                <td><strong>P. Medio</strong></td>
                <td><strong>P. Últ.</strong></td>
                <td><strong>Últ. mod.</strong></td>
            </tr>";

    foreach ($json_output as $object):?>

        <tr class="content">
            <td><strong><?php echo $object->{'Contador'} ?></strong></td>
            <td><strong><?php echo $object->{'Codigo'} ?></strong></td>
            <td><strong><?php echo $object->{'Descripcion'} ?></strong></td>
            <td><strong><?php echo $object->{'Familia'} ?></strong></td>
            <td><strong><?php echo substr($object->{'Precio Medio'}, 0, 5) ?>€</strong></td>
            <td><strong><?php echo substr($object->{'Ultimo Precio'}, 0, 8) ?>€</strong></td>
            <td><strong><?php echo substr($object->{'Ultima Modificacion'}, 0, 10) ?></strong></td>
        </tr>

    <?php endforeach;
    echo "</table>";
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
