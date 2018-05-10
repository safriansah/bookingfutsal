<div ng-controller="AdminController">
<div class="note" id="note" ng-show="note" ng-include="'assets/pg/admin/add.php'"></div>
<div class="note" style="cursor:pointer;text-align:center;" id="note" ng-show="noti" ng-click="hideNote()">{{notif}}</div>
<div class="note" ng-show="sdel" id="note" ng-include="'assets/pg/cdel.php'"></div>
<div class="row">
    <div class="col-sm-6"><h1>Tabel Admin</h1></div>
    <div class="col-sm-6"><input ng-click="showForm()" ng-show="user.tipe=='1'?'':'hide'" type="button" style="float:right" value="New Admin"></div>
</div>
    <table class="table" ng-init="getRecords()">
        <tr>
            <th>ID Admin</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Jenis Kelamin</th>
            <th>CRUD</th>
        </tr>

        <tr ng-repeat="admin in res" ng-show="(user.tipe=='1' && admin.ID_ADMIN==user.id)||user.tipe=='0'?'hide':''">
            <td>{{admin.ID_ADMIN}}</td>
            <td>{{admin.NAMA_ADMIN}}</td>
            <td>{{admin.ALAMAT}}</td>
            <td>{{admin.TELP}}</td>
            <td>{{ admin.GENDER=='1'? 'Laki-Laki':'Perempuan'}}</td>
            <td>
            <input ng-click="edit(admin)" type="button"  value="Edit">
            <input ng-show="admin.TIPE=='0' || user.tipe=='1'?'':'hide'" ng-click="setKode(admin.ID_ADMIN)" type="button"  value="Delete">
            </td>
        </tr>
    </table>
    </div>