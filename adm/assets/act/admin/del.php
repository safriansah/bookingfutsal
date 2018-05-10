<?php
include "../../../../assets/php/admin.php";
$a=$_POST["kode"];
$obj=new Admin();
$res=$obj->delete($a);
if($res=="1"){
    $mes="1";
} 
else $mes="2";
header('Location: ../../../../adm/admin-mes-'.$mes);
?>