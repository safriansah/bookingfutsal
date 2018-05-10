<?php
include "../../../../assets/php/booking.php";
$a=$_POST["kode"];
$obj=new Booking();
$res=$obj->delete($a);
if($res=="1"){
    $res=="1";
} 
else $res=="2";
header('Location: ../../../../adm/booking-mes-'.$res);
?>