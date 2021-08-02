<?php
    $mysql = require_once "../conexion.php";
    $perfil = $_POST["perfil"];
    $porcentaje = $_POST["costo"];
    $cambio = $_POST["cambio"];

    $selectS = "SELECT * FROM producto WHERE CATEGORIA = '$perfil' ;";
    $resultados = $mysql->query($selectS);
    $registros_T= mysqli_num_rows($resultados); 
    
    if($registros_T===0){
        header("location: ../index.php");
        return;
    }else{
        if($cambio === "AUMENTO"){
            print_r("vamos a hacer tus cambios");
            while($filas= $resultados->fetch_assoc()){
                $select = "UPDATE `producto` SET COSTO=? WHERE ID = ?" ;
                $resultado = $mysql->prepare($select);
                $val=$filas["COSTO"]*.01;
                $operacion= $val*$porcentaje;
                $total = $filas["COSTO"] + $operacion;

                $resultado -> bind_param("di",$total,$filas["ID"]);
                $resultado ->execute();
            }
        }else{
            //print_r("vamos a hacer tus cambios");
            while($filas= $resultados->fetch_assoc()){
                $select = "UPDATE `producto` SET COSTO=? WHERE ID = ?" ;
                $resultado = $mysql->prepare($select);
                $val=$filas["COSTO"]*.01;
                $operacion= $val*$porcentaje;
                $total = $filas["COSTO"] - $operacion;

                $resultado -> bind_param("di",$total,$filas["ID"]);
                $resultado ->execute();
            }
        }
    }
    header("location: ../index.php");
    //while($filas= $resultados->fetch_assoc()){

//    }

  //  $select = "UPDATE `producto` SET PERFIL=?, NAME=?, DESCRIPCION=?, MEDIDA=?, COSTO=?, CATEGORIA=? WHERE ID = ?" ;
    //$resultado = $mysql->prepare($select);
    //$resultado -> bind_param("ssssisi",$perfil,$nombre,$desc,$medida,$cost,$cat,$id);
    //$resultado ->execute();
    //header("location: index.php");

?>