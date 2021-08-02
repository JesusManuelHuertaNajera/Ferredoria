<?php
    $mysql = require_once "../conexion.php";
    $id= $_POST["id"];
    $old= $_POST["old"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];

    $buscar = "SELECT * FROM producto  WHERE CATEGORIA = '$old' ";
    $check = $mysql->query($buscar);
    if($check){
        
        foreach($check as $filas){
            $i = $filas["ID"];
            $cambios = "UPDATE `producto` SET CATEGORIA = ? WHERE ID = ? ";
            $resultados = $mysql->prepare($cambios);
            $resultados -> bind_param("si",$nombre,$i);
            $resultados ->execute();
        }
    }else{
        
    }

    $select = "UPDATE `categoria` SET NAME = ?, DESCRIPCION=? WHERE ID = ?" ;
    $resultado = $mysql->prepare($select);
    $resultado -> bind_param("ssi",$nombre,$descripcion,$id);
    $resultado ->execute();
    header("location: inicio.php");
?>