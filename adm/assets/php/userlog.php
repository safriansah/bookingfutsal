<?php
session_start();
$res['id']=$_SESSION['id'];
$res['nama']=$_SESSION['nama'];
$res['tipe']=$_SESSION['tipe'];
echo json_encode($res);
?>