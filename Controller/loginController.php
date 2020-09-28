<?php
include "../model/user.php";
include "../model/conexion.php";
$email=$_POST ['email'];
$password=$_POST ['password'];
//echo "email es {$femail} y la pass es {$fpassword}
//creo objeto user (la primera mayuscula porque es una clase)
$user=new User($email, $password);
echo $user->getEmail();
echo "<br>";
echo $user->getPassword();
$sql="SELECT * FROM tbl_user WHERE email=? AND passwd=?";
$smt=$pdo->prepare ($sql);
$smt->bindParam (1,$email);
$smt->bindParam (2,$password);
$smt->execute();
$numUser=$smt->rowCount();
echo "<br>";
echo $numUser;

if($numUser==1){
    // Hacemos una redireccion a home.php
    header("Location:../view/home.php");
}else{
    //Fallo en la autenticacion
    header("Location:../view/vista_login.html?error=1");
}