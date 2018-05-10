    <h1 style="text-align:center">Form {{tipe}} Data Admin</h1>
    <form>
        <input type="text" ng-model="tipe" value="" hidden>
        <table class="tab">
        <tr>
            <td>ID Admin</td>
            <td>:</td>
            <td><input type="input" value="" readonly ng-model="form.id_admin" required maxlength="8"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="input" value="" ng-model="form.nama_admin" required maxlength="32"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><input type="input" value="" ng-model="form.alamat_admin" required maxlength="64"></td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td>:</td>
            <td><input type="input" value="" ng-model="form.telp_admin" required maxlength="16"></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
                <select ng-model="form.gender_admin" required>
                <option value="">Pilih Gender</option>
                <option value="1">Laki-laki</option>
                <option value="2">Perempuan</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="password" value="" ng-model="form.pass" required placeholder="{{ placeholder }}" maxlength="32"></td>
        </tr>
        <tr>
            <td><input ng-click="hideForm()" type="button" value="<-"></td>
            <td></td>
            <td><input style="float:right" ng-click="simpan()" type="button" value="Simpan"></td>
        </tr>        
    </table>
    </form>
