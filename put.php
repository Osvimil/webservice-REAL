<?php
include 'conexion.php';


$name =  isset($_POST['name'])==true?$_POST['name']:"";
$email = isset($_POST['email'])==true?$_POST['email']:"";
$id = isset($_POST['id'])==true?$_POST['id']:"";

echo "SALIDA: "." ".$name." ".$email." "."<br>";


$query = "UPDATE usuarios SET id='$id', name='$name' ,email='$email' WHERE  id='$id'";
$valor = mysqli_query($conexion,$query);
if($id!=""&&$name!=""&&$email!=""){
if ($valor) {
       $json = array("status" =>1 , "msg" => "actualizado");
       header('content-type: application/json');
       echo json_encode($json);
}}

@mysqli_close($conn);
?>
