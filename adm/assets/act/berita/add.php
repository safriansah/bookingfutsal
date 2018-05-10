<?php
include "../../../../assets/php/berita.php";
$a=$_POST["admin"];
$b=$_POST["judul"]; 
$c=$_POST["konten"]; 
$e=$_POST["kode"];

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
   
   if(empty($errors)==true) {
      move_uploaded_file($file_tmp,"../../../../assets/img/".$file_name);
      chmod("../../../../assets/img/".$file_name,0777);
   }else{
      print_r($errors);
   }

$d=$file_name;
$ber=new Berita();
if($_GET["q"]=='add') $res=$ber->add($a,$b,$c,$d);
else if($_GET["q"]=='upd'){
    $edt=$ber->edit($e);
    $data = $edt->fetch(PDO::FETCH_OBJ);
    unlink("../../../../assets/img/".$data->GAMBAR);
    $res=$ber->update($e,$b,$c,$d);
}
?>