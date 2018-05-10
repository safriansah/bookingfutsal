<?php
include "../../../../assets/php/admin.php";
$a=$_POST["id_admin"];
$b=$_POST["nama_admin"]; 
$c=$_POST["alamat_admin"]; 
$d=$_POST["telp_admin"];
$e=$_POST["gender_admin"];
if($_POST["pass"]) $pass=$_POST["pass"];

$obj=new Admin();
if($_GET["q"]=='add'){
    $res=$obj->add($a,$b,$c,$d,$e,$pass,"1");
}
else if($_GET["q"]=='upd'){
    $res=$obj->update($a,$b,$c,$d,$e);
    if($_POST["pass"]) $res2=$obj->pass($a,$pass);
}
if($res=="1"){
    $mes="1";
} 
else $mes="2";
echo"<script>alert(".$_POST["tipe"].")</script>";
if($_POST["tipe"]!="0") header("Location: ../../../../adm/admin-upd-$a-mes-$mes");
else header('Location: ../../../../adm/admin-mes-'.$mes);
?>