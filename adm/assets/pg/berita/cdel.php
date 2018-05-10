<form method="post" action="assets/act/berita/del.php">
<input type="text" name="kode" value="<?php echo $_GET['q']; ?>" hidden>
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