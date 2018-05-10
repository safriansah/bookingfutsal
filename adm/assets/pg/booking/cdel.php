<form method="post" action="assets/act/booking/del.php">
<input type="text" name="kode" value="<?php echo $_GET['r']; ?>" hidden>
<div class="row">
    <div class="col-sm-12 center">Anda Yakin Ingin Menghapus Data</div>
    <div class="col-sm-12 center">"<?php echo $_GET['r']; ?>"</div>
    <div class="col-sm-6 center">
        <input type="submit" value="YES"></a>
    </div>
    <div class="col-sm-6 center">
        <input type="button" onclick="nocdel()" value="NO">
    </div>
</div>
</form>