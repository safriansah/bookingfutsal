<option value=''>. . .</option>
<?php 
$a=$_GET["q"];
$a+=1;
if($_GET["q"]==7)$z=24;
else $z=25;
while($a<$z){
    $c=$a;
    if($c<10) $c="0".$c;
    echo"<option value='$a'>".$c.".00</option>";
    $a++;
}
?>