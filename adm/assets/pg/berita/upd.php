<?php
include "../assets/php/berita.php"; 
$a=$_GET["kode"];
$ber=new Berita();
$edt=$ber->edit($a);
$data = $edt->fetch(PDO::FETCH_OBJ);
?>
<h1>Update Post</h1>
<form method="POST" action="assets/act/berita/add.php?q=upd" enctype="multipart/form-data">
<input type="text" id="admin" name="admin" value="<?php echo $data->ID_ADMIN; ?>" hidden>
<div class="row">
<input type="text" id="kode" name="kode" value="<?php echo $data->KD_BERITA; ?>" placeholder="Post Title" hidden>
    <div class="col-sm-12 batas"><input type="input" required="required" maxlength="64" name="judul" id="judul" placeholder="Post Title" value="<?php echo $data->JUDUL; ?>"></div>
    <div class="col-sm-12 batas"><textarea id="mce" name="konten" required="required" placeholder="Masukkan ..."><?php echo $data->KONTEN; ?></textarea></div>
    <div class="col-sm-12 batas"><input type="file" id="gambar" name="gambar" value="<?php echo $data->GAMBAR; ?>" name="gambar"></div>
    <div class="col-sm-12 batas"><a href="berita"><input type="button" value="<-"></a><input style="float:right" type="submit" value="Save"></div>
</div>
</form>