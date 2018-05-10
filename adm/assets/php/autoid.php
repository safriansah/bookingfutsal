<?php
$id="";
$id.=date('y');
$id.=date('m');
$characters = '0123456789';
for ($i = 0; $i < 4; $i++) $id.=$characters[mt_rand(0, 9)];
$res['data'] = $id;
echo json_encode($res);
?>