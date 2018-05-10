<h1>{{ tipe }} Post</h1>
<form method="post" id="add" title="entry" class="save" ng-submit="simpan()" id="uploadXls" enctype="multipart/form-data">
<div class="row">
<input type="text" id="kode" ng-model="form.kode" value="0" placeholder="Post Title" hidden>
    <div class="col-sm-12 batas"><input type="input"
     maxlength="64" ng-model="form.judul" name="judul" id="judul" placeholder="Post Title" value=""></div>
    <div class="col-sm-12 batas"><textarea ui-tinymce="mceOption" name="konten" ng-model="form.konten"></textarea></div>
    <div class="col-sm-12 batas"><img ng-if="tipe=='Update'" height="128px" name="gambar" src="../assets/img/{{gambar}}" alt="">{{ tipe=='Update'?'!Previous Image':'' }}  <hr ng-if="tipe=='Update'"><input type="file" ng-model="form.gambar"></div>
    <div class="col-sm-12 batas"><input type="button" ng-click="hideForm()" value="<-"><input style="float:right" type="submit" value="Save"></div>
</div>
</form>