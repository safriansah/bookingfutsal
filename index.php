<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lapangan Futsal</title>
    <link rel="stylesheet" href="assets/inc/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/inc/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/inc/date/jquery-ui.css" type="text/css"/>
    <script src="assets/inc/date/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/inc/date/jquery-ui.js" type="text/javascript"></script>
    <script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });
    </script>
</head>
<body>
<?php
error_reporting(0);
include'assets/pg/head.php';
if($_GET['pg']=="adm") header('Location: adm/');
else if($_GET['pg']){
    include"assets/pg/".$_GET['pg'].".php";
}
else include'assets/pg/main.php';
include'assets/pg/foot.php';
?>
<script src="assets/js/script.js" type="text/javascript"></script>
</body>
</html>
