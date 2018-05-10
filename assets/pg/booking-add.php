<?php
include "../php/booking.php";
$a=$_POST["kode"];
$b=$_POST["lap"];
$c=$_POST["team"];
$d=$_POST["pemesan"];
$e=$_POST["telp"];
$f=$_POST["tglmain"];
$tgl=substr($f,3,2);
$bln=substr($f,0,2);
$th=substr($f,6,4);
$f=$th."-".$bln."-".$tgl;
$g=$_POST["mulai"];
$h=$_POST["selesai"];
$i=$_POST["harga"];
$j=$_POST["dp"];
$obj=new Booking();
$res=$obj->cek($b,$f,$g,$h);
if($res=="1"){
    $mes="Failed : Lapangan $b Sudah Terbooking Pada Tanggal $tgl - $bln - $th Pada Jam $g - $h Selengkapnya Lihat Halaman Booking";
}
else{
    $res=$obj->add($a, "", $b, $c, $d, $e, $f, $g, $h, $i, $j);
    if($res=="1"){
        $mes="Succes : $a";
    } 
    else $mes="Failed : Periksa Koneksi Anda";
}
echo"<script>alert('$mes');window.location.replace('../../booking');</script>";
?>