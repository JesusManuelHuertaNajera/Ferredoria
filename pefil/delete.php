<?php
if (!isset($_GET["id"])){
  exit("no hay id");
}
$mysql = require_once "../conexion.php";
$id=$_GET["id"];
$DELETE = "DELETE  from perfil WHERE ID= ?";
$resultado = $mysql->prepare($DELETE);
$resultado -> bind_param("i",$id);
$resultado->execute();
header("location: inicio.php")
?>