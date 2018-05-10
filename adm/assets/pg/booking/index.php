<div ng-controller="BookingController">    
<div class="note" id="note" ng-show="note" ng-include="'assets/pg/booking/upd.php'"></div>
<div class="note" style="cursor:pointer;text-align:center;" id="note" ng-show="noti" ng-click="hideNote()">{{notif}}</div>
<div class="note" ng-show="sdel" id="note" ng-include="'assets/pg/cdel.php'"></div>
<h1>Tabel Booking</h1>
    <table class="table" ng-init="getRecords()">
    <tr>
        <th>Kode Booking</th>
        <th>Lapangan</th>
        <th>Waktu Booking</th>
        <th>Nama Team</th>
        <th>Pemesan</th>
        <th>Tanggal Main</th>
        <th>Total Harga</th>
        <th>Terbayar</th>
        <th>Sisa</th>
        <th>Status</th>
        <th>CRUD</th>
    </tr>
        
        <tr ng-repeat="data in res" ng-show="(user.tipe=='1' && data.ID_ADMIN==user.id || data.STATUS=='0')||user.tipe=='0'?'hide':''">
            <td>{{data.KODE_BOOK}}</td>
            <td>{{data.KODE_LAP}}</td>
            <td>{{data.TGL_BOOK}}<br>{{data.JAM_BOOK}}</td>
            <td>{{data.NAMA_TEAM}}</td>
            <td>{{data.NAMA_PEMESAN}}<br>{{data.TELP}}</td>
            <td>{{data.TGL_MAIN}}<br>{{data.START}}.00 - {{data.END}}.00</td>
            <td>Rp. {{formatRp(data.HARGA)}}</td>
            <td>Rp. {{formatRp(data.TERBAYAR)}}</td>
            <td>Rp. {{formatRp(data.SISA)}}</td>
            <td>{{ data.STATUS=='1'? 'V':'-'}}</td>
            <td>
            <input ng-click="edit(data)" type="button"  value="Verifikasi">
            <input ng-show="data.STATUS=='1'?'':'hide'" ng-click="setKode(data)" type="button"  value="Delete">
            </td>
        </tr>   
    </table>
    </div>