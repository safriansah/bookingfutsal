<?php
error_reporting(0);
session_start();
include "../../../../assets/php/admin.php";
$a=$_POST["user"];
if($_POST["pass"]) $pass=$_POST["pass"];

$obj=new Admin();
$res=$obj->login($a,$pass);
$data = $res->fetch(PDO::FETCH_OBJ);
if($data->ID_ADMIN){
    $_SESSION['id']=$data->ID_ADMIN;
    $_SESSION['nama']=$data->NAMA_ADMIN;
    $_SESSION['tipe']=$data->TIPE;
}
else{
echo"<script>alert('Id Admin atau Pasword Salah')</script>";
}
echo"<script>window.location.replace('../../../../adm/');</script>";
?>
