var	app=angular.module('myApp',['ngRoute','ui.tinymce']);

app.controller('MenuController',function($scope,$http){
    $scope.getUser=function(){
        $http.get('assets/php/userlog.php', {
            params:{
                'type':'view',
            }
        })
        .then(function(response){
            $scope.user = response.data;
            if($scope.user.nama==null) window.location.href='assets/pg/login/';
        });    
    };
    $scope.getUser();
});

app.controller('HomeController',function($scope,$http){
    $scope.getUser=function(){
        $http.get('assets/php/userlog.php', {
            params:{
                'type':'view',
            }
        })
        .then(function(response){
            $scope.user = response.data;
            if($scope.user.nama==null) window.location.href='assets/pg/login/';
        });    
    };
    $scope.getUser();

    $scope.formatRp=function(nume){
        var num=parseInt(nume);
        var p = num.toFixed(2).split(".");
        return p[0].split("").reverse().reduce(function(acc, num, i, orig) {
            return  num=="-" ? acc : num + (i && !(i % 3) ? "," : "") + acc;
        }, "") + "." + p[1];
    }

    $scope.today = new Date();
    $scope.getTotal=function(data){
        var total=0;
        for(var i=0; i<data.length; i++){
            total+=parseInt(data[i].total);
        }
        return total;
    }
    $scope.getJum=function(data){
        var total=0;
        for(var i=0; i<data.length; i++){
            total+=parseInt(data[i].jumlah);
        }
        return total;
    }
    $scope.getRecords = function(){
        $http.get('assets/php/main.php', {
            params:{
                'type':'jumlah',
                'tabl':'ADMIN'
            }
        })
        .then(function(response){
            $scope.juma = response.data.records;
        });
        
        $http.get('assets/php/main.php', {
            params:{
                'type':'jumlah',
                'tabl':'BERITA'
            }
        })
        .then(function(response){
            $scope.jumb = response.data.records;
        });
        
        $http.get('assets/php/main.php', {
            params:{
                'type':'jumlah',
                'where':'1',
                'key':'STATUS',
                'val':'0',
                'tabl':'BOOKING'
            }
        })
        .then(function(response){
            $scope.jumo = response.data.records;
        });
        
        $http.get('assets/php/main.php', {
            params:{
                'type':'group',
                'tabl':'BOOKING'
            }
        })
        .then(function(response){
            $scope.lapa = response.data.records;
        });

        $http.get('assets/php/main.php', {
            params:{
                'type':'group',
                'cond':'tahun',
                'tabl':'BOOKING'
            }
        })
        .then(function(response){
            $scope.lapt = response.data.records;
        });

        $http.get('assets/php/main.php', {
            params:{
                'type':'group',
                'cond':'bulan',
                'tabl':'BOOKING'
            }
        })
        .then(function(response){
            $scope.lapb = response.data.records;
        });
        
    };
});

app.controller('AdminController',function($scope,$http){

    $scope.getUser=function(){
        $http.get('assets/php/userlog.php', {
            params:{
                'type':'view',
            }
        })
        .then(function(response){
            $scope.user = response.data;
            if($scope.user.nama==null) window.location.href='assets/pg/login/';
        });    
    };
    $scope.getUser();

    $scope.hide=false;
    $scope.showNote=function(msg){
        $scope.noti = true;
        $scope.notif=msg+" (x)";
    }
    $scope.hideNote=function(){
        $scope.noti = false;
    }

    $scope.toCDel=function(bol){
        $scope.sdel=bol;
    }
    $scope.setKode=function(kd){
        $scope.kode=kd;
        $scope.toCDel(true);
    }

    $scope.showForm=function(){
        $scope.note = true;
        $scope.setNull();
        $scope.tipe="Add";
        $scope.getId();
        $scope.placeholder="";
    }
    $scope.hideForm=function(){
        $scope.note = false;
        $scope.setNull();
    }
    $scope.setNull=function(){
        $scope.form = {
            id_admin:null,
            nama_admin:null,
            alamat_admin:null,
            telp_admin:null,
            gender_admin:null
        };
    }
    $scope.hideForm();

    $scope.res=[];
    $scope.getRecords=function(){
        $http.get('assets/php/main.php', {
            params:{
                'type':'view',
                'tabl':'ADMIN'
            }
        })
        .then(function(response){
            $scope.res = response.data.records;
        });    
    };

    $scope.getId=function(){
        $http.get('assets/php/autoid.php', {
            params:{
                'type':'view',
            }
        })
        .then(function(response){
            $scope.id = response.data;
            console.log($scope.id);
            $scope.form.id_admin=$scope.id.data;
        });    
    };

    $scope.form={};
    $scope.simpan=function(){
        if($scope.form.id_admin==null || $scope.form.nama_admin==null || $scope.form.alamat_admin==null || $scope.form.telp_admin==null || $scope.form.gender_admin==null){
            $scope.showNote('Lengkapi Form Yang Tersedia !');
        }
        else if($scope.tipe=="Add" && $scope.form.pass==null){
            $scope.showNote('Lengkapi Form Yang Tersedia !');
        } 
        else{
            $http.post('assets/php/admin.php',{
                'id_admin':$scope.form.id_admin,
                'nama_admin':$scope.form.nama_admin,
                'alamat_admin':$scope.form.alamat_admin,
                'telp_admin':$scope.form.telp_admin,
                'gender_admin':$scope.form.gender_admin,
                'pass':$scope.form.pass,
                'type':$scope.tipe
            })
            .then(function onSuccess(response) {
                console.log(response);
                $scope.res = response.data;
                $scope.showNote($scope.res.msg);
                $scope.getRecords();
                $scope.hideForm();
            })
            .catch(function onError(response)  {
                console.log(response);
                $scope.showNote('sek eror');
            })
        }
    }

    $scope.del = function(id) {
			$http.post("assets/php/admin.php", {'id': id,'type':'delete'})
			.then(function onSuccess(response) {
                console.log(response);
                $scope.res = response.data;
                $scope.showNote($scope.res.msg);
                $scope.getRecords();
                $scope.hideForm();
                $scope.toCDel(false);
            })
            .catch(function onError(response)  {
                console.log(response);
                $scope.showNote('sek eror');
                $scope.toCDel(false);
            })
		}

    $scope.edit = function(user){
        $scope.form = {
            id_admin:user.ID_ADMIN,
            nama_admin:user.NAMA_ADMIN,
            alamat_admin:user.ALAMAT,
            telp_admin:user.TELP,
            gender_admin:user.GENDER
        };
        $scope.placeholder="*kosongkan jika tidak diganti";
        $scope.tipe="Update";
        $scope.note = true;
    };
});

app.controller('BookingController',function($scope,$http){
            
    $scope.formatRp=function(nume){
        var num=parseInt(nume);
        var p = num.toFixed(2).split(".");
        return p[0].split("").reverse().reduce(function(acc, num, i, orig) {
            return  num=="-" ? acc : num + (i && !(i % 3) ? "," : "") + acc;
        }, "") + "." + p[1];
    }

    $scope.getUser=function(){
        $http.get('assets/php/userlog.php', {
            params:{
                'type':'view',
            }
        })
        .then(function(response){
            $scope.user = response.data;
            if($scope.user.nama==null) window.location.href='assets/pg/login/';
        });    
    };
    $scope.getUser();
        
    $scope.hide=false;
    $scope.showNote=function(msg){
            $scope.noti = true;
            $scope.notif=msg+" (x)";
    }
    $scope.hideNote=function(){
            $scope.noti = false;
    }
    
    $scope.toCDel=function(bol){
            $scope.sdel=bol;
    }
    $scope.setKode=function(kd){
            $scope.kode=kd;
            $scope.toCDel(true);
    }
    
    $scope.showForm=function(){
            $scope.note = true;
    }
    $scope.hideForm=function(){
            $scope.note = false;
    }
    $scope.hideForm();
    
    $scope.res=[];
    $scope.getRecords=function(){
            $http.get('assets/php/main.php', {
                params:{
                    'type':'view',
                    'tabl':'BOOKING'
                }
            })
            .then(function(response){
                $scope.res = response.data.records;
            });    
    };
        
    $scope.simpan=function(){
            if($scope.form.id==null || $scope.form.sts_book==null || $scope.form.kd_book==null){
                $scope.showNote('Oops Terjadi Kesalahan !');
            }
            else{
                $http.post('assets/php/booking.php',{
                    'id':$scope.form.id,
                    'sts_book':$scope.form.sts_book,
                    'kd_book':$scope.form.kd_book,
                    'type':'Update'
                })
                .then(function onSuccess(response) {
                    console.log(response);
                    $scope.res = response.data;
                    $scope.showNote($scope.res.msg);
                    $scope.getRecords();
                    $scope.hideForm();
                })
                .catch(function onError(response)  {
                    console.log(response);
                    $scope.showNote('sek eror');
                })
            }
    }
    
    $scope.del = function(id) {
                $http.post("assets/php/booking.php", {'id': id,'type':'delete'})
                .then(function onSuccess(response) {
                    console.log(response);
                    $scope.res = response.data;
                    $scope.showNote($scope.res.msg);
                    $scope.getRecords();
                    $scope.hideForm();
                    $scope.toCDel(false);
                })
                .catch(function onError(response)  {
                    console.log(response);
                    $scope.showNote('sek eror');
                    $scope.toCDel(false);
                })
            }
    
    $scope.edit = function(data){
            $scope.form = {
                id:$scope.user.id,
                kd_book:data.KODE_BOOK,
                dp:'Rp. '+$scope.formatRp(data.DP),
                terbayar:'Rp. '+$scope.formatRp(data.TERBAYAR),
                sts_book:data.STATUS
            };
            $scope.gambar=data.GAMBAR;
            $scope.note = true;
    };
});

app.controller('BeritaController',function($scope,$http){

    $scope.getUser=function(){
        $http.get('assets/php/userlog.php', {
            params:{
                'type':'view',
            }
        })
        .then(function(response){
            $scope.user = response.data;
            if($scope.user.nama==null) window.location.href='assets/pg/login/';
        });    
    };
    $scope.getUser();

    $scope.mceOption={
        plugins:'link image code',
        toolbar:'undo redo | bold italic | alignleft aligncenter alignright | code'
    }
    $scope.hide=false;
    $scope.showNote=function(msg){
        $scope.noti = true;
        $scope.notif=msg+" (x)";
    }
    $scope.hideNote=function(){
        $scope.noti = false;
    }

    $scope.toCDel=function(bol){
        $scope.sdel=bol;
    }
    $scope.setKode=function(kd){
        $scope.kode=kd;
        $scope.toCDel(true);
    }

    $scope.showForm=function(){
        $scope.form.gambar="";
        $scope.note = true;
        $scope.setNull();
        $scope.tipe="Add";
        $scope.gambar='';
    }
    $scope.hideForm=function(){
        $scope.note = false;
        $scope.setNull();
    }
    $scope.setNull=function(){
        $scope.form = {
            id_admin:null,
            nama_admin:null,
            alamat_admin:null,
            telp_admin:null,
            gender_admin:null
        };
    }
    $scope.hideForm();

    $scope.res=[];
    $scope.getRecords=function(){
        $http.get('assets/php/main.php', {
            params:{
                'type':'view',
                'tabl':'BERITA'
            }
        })
        .then(function(response){
            $scope.res = response.data.records;
        });    
    };

    $scope.form={};
    $scope.simpan=function(){

        var formData = new FormData();
        formData.append('gambar', $('input[type=file]')[0].files[0]);
        formData.append('judul', $scope.form.judul);
        formData.append('konten', $scope.form.konten);
        formData.append('admin', $scope.user.id);

        if($scope.tipe=='Update'){
            $scope.opt='upd';
            $scope.msg='Data has been updated successfully.'
            formData.append('kode', $scope.form.kode);
        }
        else{
            $scope.opt='add';
            $scope.msg='Data has been added successfully.'
        }

        $.ajax({
            url: "assets/act/berita/add.php?q="+$scope.opt, // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                $scope.showNote($scope.msg);
                $scope.getRecords();
                $scope.hideForm();
            }
          });
    }

    $scope.del = function(id) {
			$http.post("assets/php/berita.php", {'id': id,'type':'delete'})
			.then(function onSuccess(response) {
                console.log(response);
                $scope.res = response.data;
                $scope.showNote($scope.res.msg);
                $scope.getRecords();
                $scope.hideForm();
                $scope.toCDel(false);
            })
            .catch(function onError(response)  {
                console.log(response);
                $scope.showNote('sek eror');
                $scope.toCDel(false);
            })
		}

    $scope.edit = function(data){
        $scope.form = {
            judul:data.JUDUL,
            kode:data.KD_BERITA,
            konten:data.KONTEN,
            gambar:""
        };
        $scope.gambar=data.GAMBAR;
        $scope.placeholder="*kosongkan jika tidak diganti";
        $scope.tipe="Update";
        $scope.note = true;
        $scope.form.gambar="";
    };
});

app.config(function($routeProvider){
    $routeProvider.when('/',{
            templateUrl	:	'assets/pg/main.php',
            controller	:	'HomeController'
    })
    .when('/admin',{
            templateUrl	:	'assets/pg/admin/',
            controller	:	'AdminController'		
    })
    .when('/booking',{
            templateUrl	:	'assets/pg/booking/',
            controller	:	'BookingController'		
    })
    .when('/berita',{
        templateUrl	:	'assets/pg/berita/',
        controller	:	'BeritaController'		
    })
    .otherwise({
            redirectTo	:	'/'
    })
});