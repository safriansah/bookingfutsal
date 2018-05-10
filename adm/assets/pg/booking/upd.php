
<h1 style="text-align:center">Form Verifikasi Booking</h1>
    <form method="post" action="assets/act/booking/add.php">
        <table class="tab">
        <tr>
            <td>ID Admin</td>
            <td>:</td>
            <td><input type="input" value="" ng-model="form.id" readonly></td>
        </tr>
        <tr>
            <td>Kode Booking</td>
            <td>:</td>
            <td><input type="input" value="" ng-model="form.kd_book" readonly></td>
        </tr>
        <tr>
            <td>DP</td>
            <td>:</td>
            <td><input ng-model="form.dp" type="input" value="" readonly></td>
        </tr>
        <tr>
            <td>Terbayar</td>
            <td>:</td>
            <td><input ng-model="form.terbayar" type="input" value="" readonly></td>
        </tr>
        <tr>
            <td>Gambar</td>
            <td>:</td>
            <td><img height="192px" src="../assets/img/{{gambar}}" alt="">{{gambar==''?'Belum ada gambar':''}}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td>
                <select ng-model="form.sts_book">
                <option value="1">Terbayar</option>
                <option value="0">Belum Terbayar</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><input ng-click="hideForm()" type="button" value="<-"></td>
            <td></td>
            <td><input ng-click="simpan()" style="float:right" type="button" value="Verifikasi"></td>
        </tr>        
</table>