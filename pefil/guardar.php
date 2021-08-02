<?php
    $mysql = require_once "../conexion.php";
    $db= "doria";
    $nombre = $_POST["nombre"];
    $desc = $_POST["descripcion"];
    $select = "INSERT INTO `perfil`( `NAME`, `DESCRIPCION`) VALUES (?,?)";
    
    //print_r($select);
    $resultado = $mysql->prepare($select);
    $resultado -> bind_param("ss",$nombre,$desc);
    $resultado ->execute();
    //$resultado -> store_result();
    header("location: inicio.php");
?>