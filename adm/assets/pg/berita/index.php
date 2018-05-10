<div ng-controller="BeritaController">
<div class="note" id="note" ng-show="note" ng-include="'assets/pg/berita/add.php'"></div>
<div class="note" style="cursor:pointer;text-align:center;" id="note" ng-show="noti" ng-click="hideNote()">{{notif}}</div>
<div class="note" ng-show="sdel" id="note" ng-include="'assets/pg/cdel.php'"></div>
<div style="overflow:hidden" ng-init="getRecords()">
    <h1 style="float:left">tabel Berita</h1>
    <input type="button" style="float:right" ng-click="showForm()" value="New Post">
</div>
<div ng-repeat="data in res" ng-show="(user.tipe=='1' && data.ID_ADMIN==user.id)||user.tipe=='0'?'hide':''">
<div class="row batas">
    <div class="col-sm-1">{{ data.KD_BERITA }}</div>
    <div class="col-sm-5">{{ data.JUDUL }}</div>
    <div class="col-sm-2">{{ data.ID_ADMIN }}</div>
    <div class="col-sm-1">{{ data.VIEW }}</div> 
    <div class="col-sm-3">{{ data.TGL }}</div>
</div>
<div class="row bbawah">
    <div class="col-sm-1"></div>
    <div class="col-sm-6"><input type="button" ng-click="edit(data)" value="Edit"> || <input type="button" value="Delete" ng-click="setKode(data.KD_BERITA)"></div>
    <div class="col-sm-5"></div>
</div>
</div>
</div>