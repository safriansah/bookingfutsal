<form method="post" action="assets/pg/booking-ver.php" enctype="multipart/form-data">
<div class="row">
    <div class="col-sm-1 lapp pointer" onclick="clform()">X</div>
    <div class="col-sm-11 lapp">form verification book</div>
    <div class="col-sm-1 bookform" id="bantu"></div>
    <div class="bookform col-sm-11">
    <table>
        <tr>
            <td class="kolom">
                Kode Book
            </td>
            <td class="kolom">
                : <input class="masukan" maxlength="8" type="text" name="kode" placeholder="Masukkan Kode Book Anda" required>
            </td>
        </tr>
        <tr>
            <td class="kolom">
                Terbayar
            </td>
            <td class="kolom">
                : <input class="masukan" type="number" patter=[0-9] name="bayar" placeholder="Masukkan Jumlah Bayar Anda" required>
            </td>
        </tr>
        <tr>
            <td class="kolom">
                Bukti Pembayaran
            </td>
            <td class="kolom">
                : <input class="" id="gambar" name="gambar" type="file" placeholder="gambar" required>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="kolom">
                <input class="btnback col-12" type="submit" value="Submit Now">
            </td>
        </tr>
    <table>
    </div>
</div>
</div>
</form>