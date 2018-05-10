<?php
include "../../../../assets/php/booking.php";
$a=$_POST["kd_book"];
$b=$_POST["sts_book"];
$c=$_POST["id"];
$obj=new Booking();
$res=$obj->very($a,$b,$c);
if($res=="1"){
    $res=="1";
} 
else $res=="2";
header('Location: ../../../../adm/booking-mes-'.$res);
?>