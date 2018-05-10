<?php
error_reporting(0);
$id="";
$id.=date(y);
$id.=date(m);
$characters = 'QWERTYUIOPASDFGHJKLZXCVBNM';
for ($i = 0; $i < 4; $i++) $id.=$characters[mt_rand(0, 25)];
?>
<form method="post" action="assets/pg/booking-add.php">
<div class="row">
    <div class="col-sm-1 lapp pointer" onclick="clform()">X</div>
    <div class="col-sm-11 lapp">form book lapangan</div>
    <div class="col-sm-1 bookform" id="bantu"></div>
    <div class="bookform col-sm-11">
    <table>
        <tr>
            <td class="kolom">
                Kode Book
            </td>
            <td class="kolom">
                : <input class="masukan" type="text" readonly name="kode" value="<?php echo $id; ?>" required>*
            </td>
        </tr>
        <tr>
            <td class="kolom">
                Lapangan
            </td>
            <td class="kolom">
                : <select class="masukan" name="lap" placeholder="Lapangan" id="lap" onchange="getharga()" required>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="kolom">
                Nama Team
            </td>
            <td class="kolom">
                : <input class="masukan" maxlength="32" name="team" type="text" placeholder="Nama Team" required>
            </td>
        </tr>
        <tr>
            <td class="kolom">
                Nama Pemesan
            </td>
            <td class="kolom">
                : <input class="masukan" name="pemesan" maxlength="32" type="text" placeholder="Nama Pemesan" required>
            </td>
        </tr>
        <tr>
            <td class="kolom">
                Telpon
            </td>
            <td class="kolom">
                : <input class="masukan" name="telp" maxlength="16" type="number" placeholder="telp" required>
            </td>
        </tr>
        <tr>
            <td class="kolom">
                Tanggal Main
            </td>
            <td class="kolom">
                : <input class="masukan" id="datepicker" name="tglmain" type="text" placeholder="Tanggal Main" required>
            </td>
        </tr>
        <tr>
            <td class="kolom">
                Jam
            </td>
            <td class="kolom">
                : <select class='masukan' style="width:40%" id="mulai" name='mulai' placeholder='Mulai' onchange="getjam2(),getharga()" required></select> - <select id="selesai" style="width:40%" class="masukan" name="selesai" type="time" placeholder="Selesai" onchange="getharga()" required></select>
            </td>
        </tr>
        <tr>
            <td class="kolom">
                Harga
            </td>
            <td class="kolom">
                : <input class="masukan" name="harga" readonly id="harga" type="text" placeholder="Rp. 00" required>
            </td>
        </tr>
        <tr>
            <td class="kolom">
                Uang Muka
            </td>
            <td class="kolom">
                : <input class="masukan" id="dp" readonly name="dp" type="text" placeholder="DP" required>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="kolom">
            *Pastikan anda mencatat kode booking anda sebelum booking
                <input class="btnback col-12" type="submit" value="Book Now">
            </td>
        </tr>
    <table>
    </div>
</div>
</div>
</form>