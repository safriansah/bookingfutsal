<?php 
include '../php/calendar.php';
echo'<div class="row">
<div class="col-sm-1 jbook pointer" onclick="lap()"><-</div>
<div class="col-sm-11 jbook left">
Lapangan '.$_GET["q"].', '.date("F").'-'.date("Y").'
</div>
</div>';
echo "<div class='scroll'>".draw_calendar(date("m"),date("Y"),$_GET["q"])."</div>";
?>