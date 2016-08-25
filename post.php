<?php
include 'conexion.php';
$name =  isset($_POST['name'])==true?$_POST['name']:"";
$email = isset($_POST['email']) ==true?$_POST['email']:"";
$status = isset($_POST['status'])==true?$_POST['status']:"";

$sql = "INSERT INTO `modelo`.`usuarios`(`name`,`email`,`status`)VALUES ('$name','$email','$status');";

echo "SALIDA: "." ".$name." ".$email." ".$status."<br>";

 $qur = mysqli_query($conexion,$sql);

 if($name!="" && $email!="" && $status!=""){
   if ($qur) {
     $json = array("estatus"=>1, "mensaje"=> "Insertado correctamente");
     header('content-type:application/json');
     echo json_encode($json);
   }

 }
@mysqli_close($conexion);

 ?>
