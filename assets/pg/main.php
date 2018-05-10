<div id="par"></div>

<div id="slideshow">
    <div class="container">
        <div class="jberita">Bintang Futsal</div>
        <div class="row">
            <div class="col-sm-6 ccon">Bintang Futsal adalah lapangan futsal berstandar internasional. Bintang futsal beralamat di jalan Gunung Anyar Tengah 19, Surabaya. </div>
            <div class="col-sm-6 ccon"></div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container">
    <div class="col-sm-12 fas">Fasilitas</div>
        <div class="row">
            <div class="col-sm-3">
                <div class="jcon">Locker Room & Ruang ganti</div>
                <div class="ccon"><img class="col-sm-12 gambar" src="assets/img/ganti.png" alt=""><br>Tempat yang bisa dimanfaatkan untuk ganti baju & menyimpan barang-barang selagi bermain futsal</div>
            </div>
            <div class="col-sm-3">
                <div class="jcon">Shower Room</div>
                <div class="ccon"><img class="col-sm-12 gambar" src="assets/img/Shower.png" alt="">Tempat mandi setelah penatnya bermain futsal supaya tetap terlihat keren</div>
            </div>
            <div class="col-sm-3">
                <div class="jcon">Kantin</div>
                <div class="ccon"><img class="col-sm-12 gambar" src="assets/img/kantin.png" alt="">Bintang kantin menyediakan banyak menu special bagi kalian yang merasa lapar dan haus sehabis futsal</div>
            </div>
            <div class="col-sm-3">
                <div class="jcon">Musholla</div>
                <div class="ccon">Tempat yang disediakan untuk melaksanakan ibadah</div>
            </div>
        </div>
    </div>
</div>

<div class="content2">
    <div class="container">
    <div class="col-sm-12 ber">berita</div>
        <div class="row">
<?php 
include "assets/php/berita.php"; 
$ber = new Berita();
$show = $ber->limit(3);
while($data = $show->fetch(PDO::FETCH_OBJ)){
?>
            <div class="col-sm-4">
                <div class="jberita"><?php echo $data->JUDUL; ?></div>
                <div class="ccon"><?php echo substr(strip_tags($data->KONTEN),0,256); ?> <a href="berita-<?php echo $data->KD_BERITA; ?>">read more . . .</a></div>
            </div>
<?php } ?>
        </div>
        <div class="col-sm-12 jberita center"><a href="berita"><input class="btn" type="button" value="More News"></a></div>
    </div>
</div>

<!--<div class="content">
<div class="container">
<div class="col-sm-12 lap">Lapangan</div>
    <div class="row">
        <div class="col-sm-6">
            <div class="jcon">Lapangan A</div>
            <div class="ccon">Lapangan yang memliki luas 42 meter X 25 meter dan menggunakan matras sebagai alasnya. Sewa lapangan Rp. 150.000</div>
        </div>
        <div class="col-sm-6">
            <div class="jcon">Lapangan B</div>
            <div class="ccon">Lapangan yang memliki luas 42 meter X 25 meter dan menggunakan matras sebagai alasnya. Sewa lapangan Rp. 150.000</div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="jcon">Lapangan C</div>
            <div class="ccon">Lapangan yang memliki luas 25 meter X 18 meter dan menggunakan matras sebagai alasnya. Sewa lapangan Rp. 125.000</div>
        </div>
        <div class="col-sm-6">
            <div class="jcon">Lapangan D</div>
            <div class="ccon">Lapangan yang memliki luas 25 meter X 18 meter dan menggunakan matras sebagai alasnya. Sewa lapangan Rp. 125.000</div>
        </div>
    </div>
</div>
</div>-->

<div class="content3">
<div class="container">
<div class="col-sm-12 lap">Profile</div>
    <div class="row">
        <div class="col-sm-6">
            <div class="jcon">Visi</div>
            <div class="ccon">Menjadikan Bintang Futsal sebagai poros perkembangan lapangan futsal di Kota Surabaya<br>Menjadikan Bintang Futsal sebagai wadah untuk mengembangkan bakat bakat futsal di Kota Surabaya</div>
        </div>
        <div class="col-sm-6">
            <div class="jcon">Misi</div>
            <div class="ccon">Membuat tim futsal sesuai kategori umur<br>Memberikan pelayanan terbaik bagi para pelanggan<br>Memberikan fasilitas terbaik bagi para pelanggan</div>
        </div>
    </div>
</div>
</div>