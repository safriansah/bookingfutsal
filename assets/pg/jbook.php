<?php
error_reporting(0);
echo'<div class="row">
<div class="col-sm-1 jbook pointer" onclick="tgl('."'".$_GET["r"]."'".')"><-</div>
<div class="col-sm-11 jbook left">
Lapangan '.$_GET["r"].', '.$_GET["q"]."-".date("F").'-'.date("Y").'
</div>
</div>';
include"../php/booking.php";
$obj=new Booking(); 
$f=date("Y")."-".date("m")."-".$_GET["q"];
?>
    <div class="col-sm-12">
    <table class="col-sm-11">
            <tr><td class="col-sm-6 calendar-day-head">Jam</td><td class="col-sm-6 calendar-day-head">Ketersediaan</td><tr>
<?php 
$a=8;
$z=0;
while($a<24){
    $c=$a;
    $d=$a+1;
    if(z<1){
        $show = $obj->pilih($f,$c,$_GET["r"]);
        $data = $show->fetch(PDO::FETCH_OBJ);
    }
    if($data->lama){
        $z=$data->lama;
        $z2=$data->NAMA_TEAM;
    }
    if($c<10) $c="0".$c;
    if($d<10) $d="0".$d;
?>    
    <tr class='calendar-day'><td class='ijam'> <?php echo $c; ?>.00 - <?php echo $d; ?>.00 </td><td class='ijam'>
    <?php if($z>0) echo $z2; else echo "-";?> </td><tr>
<?php
    if($z>0) $z--;
    $a++;
}
?>
    </table>
    </div>