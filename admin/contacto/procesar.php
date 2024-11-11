<?php

print_r ($_POST);

include "../model/conexion.php";

$id = $_POST['id'];
$mediosContacto = $_POST['mediosContacto'];

$sentencia = $db->prepare("UPDATE contacto SET Descripcion=? WHERE ID=?");
$resultado = $sentencia->execute([$mediosContacto, $id]);

if($resultado==true){
    header("Location: ../exito.php");
}else{
    header("Location: ../error.php");
}
