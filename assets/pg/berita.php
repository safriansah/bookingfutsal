<div id="slide">
    <div class="container">
        <div class="">BERITA</div>
    </div>
</div>

<div class="contentb">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
<?php 
include "assets/php/berita.php"; 
$ber = new Berita();
if($_POST['q']) $show = $ber->cari($_POST['q']);
else $show = $ber->show();
while($data = $show->fetch(PDO::FETCH_OBJ)){
?>
                <div class="berita">
                    <div class="jberita"><?php echo $data->JUDUL; ?></div>
                    <div class="pberita"><?php echo $data->NAMA_ADMIN; ?></div>
                    <div class="pberita"><?php echo $data->TGL; ?></div>
                    <div class="iberita"><?php echo substr(strip_tags($data->KONTEN),0,256); ?>. . .</div>
                    <div class="pberita"><a href="berita-<?php echo $data->KD_BERITA; ?>">read more</a></div>
                </div>
<?php } ?>
            </div>
            <div class="col-sm-3">
            <div class="berita">
                <div class="jberita">cari berita</div>
                    <div class="iberita">
                    <form action="" method="post">
                        <input type="text" name="q" placeholder="Masukkan Topik Berita">
                        <input type="submit" value="Cari">
                    </form>
                    </div>
                </div>
                <div class="berita">
                    <div class="jberita">berita populer</div>
<?php
$show = $ber->pop('3');
$no=1;
while($data = $show->fetch(PDO::FETCH_OBJ)){
?>
                    <div class="iberita"><?php echo $no; ?>. <a href="berita-<?php echo $data->KD_BERITA; ?>"><?php echo $data->JUDUL; ?></a></div>
<?php $no++; } ?>
                </div>
                
            </div>
        </div>
    </div>
</div>