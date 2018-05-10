<?php
error_reporting(0);
include "../php/booking.php";
$a=$_POST["kode"];
$c=$_POST["bayar"];
$errors= array();
$file_name = $_FILES['gambar']['name'];
$file_size = $_FILES['gambar']['size'];
$file_tmp = $_FILES['gambar']['tmp_name'];
$file_type = $_FILES['gambar']['type'];
$file_ext=strtolower(end(explode('.',$_FILES['gambar']['name'])));

$expensions= array("jpeg","jpg","png");

if(in_array($file_ext,$expensions)=== false){
   $errors[]="extension not allowed, please choose a JPEG or PNG file.";
}

if($file_size > 2097152) {
   $errors[]='File size must be excately 2 MB';
}

$b=$file_name;
$obj=new Booking();
$res=$obj->edit($a);
$data = $res->fetch(PDO::FETCH_OBJ);
if($data->KODE_BOOK){
    if($data->DP<=$c){
        $res=$obj->gambar($a, $b, $c);
        if($res=="1"){
            $mes="Succes";
            if($data->GAMBAR) unlink("../img/".$data->GAMBAR);
            if(empty($errors)==true) {
                move_uploaded_file($file_tmp,"../img/".$file_name);
                chmod("../img/".$file_name,0777);
             }else{
                print_r($errors);
            }
        } 
        else $mes="Failed : Periksa Koneksi Anda";
    }
    else $mes="Failed : Pastikan Pembayaran Minimal DP(20% Dari Total Harga)";
}
else $mes="Failed : Pastikan Kebenaran Kode Book Anda";
echo"<script>alert('$mes');window.location.replace('../../');</script>";
?>