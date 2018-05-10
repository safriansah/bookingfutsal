<!doctype html>
<html lang="en" ng-app='myApp'>
<head>
    <meta charset="UTF-8">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="../assets/inc/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script type="text/javascript" src="../assets/inc/tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="assets/js/jquery-2.2.3.min.js" type="text/javascript"></script>
</head>
<body>
<div ng-include="'assets/pg/head.php'"></div>
<div class="container conten" id="form">
  <div class="scroll">
    <div ng-view></div>
  </div>
</div>
<div class="container copy">&copy; 2017</div>
<script src="assets/js/script.js" type="text/javascript"></script>
<script src="../assets/inc/angular/angular.js"></script>
<script src="../assets/inc/angular/angular-route.js"></script>
<script type="text/javascript" src="../assets/inc/ui-tinymce-master/src/tinymce.js"></script>
<script src="assets/js/myApp.js" type="text/javascript"></script>
</body>
</html>