<div id="slide">
    <div class="container">
        <div class="">BERITA</div>
    </div>
</div>

<div class="contentb">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
<?php 
include "assets/php/berita.php"; 
$ber = new Berita();
$v=$ber->view($_GET['q']); 
$show = $ber->edit($_GET['q']);
while($data = $show->fetch(PDO::FETCH_OBJ)){
?>
                <div class="berita" style="text-align:center;padding:16px 64px;">
                    <div class="jberita"><?php echo $data->JUDUL; ?></div>
                    <div class="pberita"><?php echo $data->NAMA_ADMIN; ?></div>
                    <div class="pberita"><?php echo $data->TGL; ?></div>
                    <div class="pberita"><img class="gberita" src="assets/img/<?php echo $data->GAMBAR; ?>"></div>
                    <div class="iberita"><?php echo $data->KONTEN; ?></div>
                </div>
<?php } ?>
            </div>
        </div>
    </div>
</div>