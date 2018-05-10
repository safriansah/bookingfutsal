<?php
include "../../../../assets/php/berita.php";
$a=$_POST["kode"];
$ber=new Berita();
$edt=$ber->edit($a);
$data = $edt->fetch(PDO::FETCH_OBJ);
unlink("../../../../assets/img/".$data->GAMBAR);
$del=$ber->delete($a);
if($res=="1"){
    $mes="1";
} 
else $mes="2";
header('Location: ../../../../adm/berita-mes-'.$mes);
?>