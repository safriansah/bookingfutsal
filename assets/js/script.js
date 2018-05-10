var form=document.getElementById("form");
var form2=document.getElementById("form2");
var note=document.getElementById("note");
note.style.display='none';
function lap(){
  var req=new XMLHttpRequest();
  req.onreadystatechange=function(){
    if(this.readyState==4 && this.status==200){
      form.innerHTML=this.responseText;
    }
  }
  req.open("get","assets/pg/lbook.php");
  req.send(null);
}
function tgl(lap){
    var req=new XMLHttpRequest();
    req.onreadystatechange=function(){
      if(this.readyState==4 && this.status==200){
        form.innerHTML=this.responseText;
      }
    }
    req.open("get","assets/pg/tbook.php?q="+lap);
    req.send(null);
}
function jam(tgl,lap){
  var req=new XMLHttpRequest();
  req.onreadystatechange=function(){
    if(this.readyState==4 && this.status==200){
      //note.style.display="block";
      form.innerHTML=this.responseText;
    }
  }
  req.open("get","assets/pg/jbook.php?q="+tgl+"&r="+lap);
  req.send(null);
}
function toform(){
  var req=new XMLHttpRequest();
  req.onreadystatechange=function(){
    if(this.readyState==4 && this.status==200){
      note.style.display="block";
      note.innerHTML=this.responseText;
      getjam('7');
      $(function() { $( "#datepicker" ).datepicker();});
    }
  }
  req.open("get","assets/pg/fbook.php?");
  req.send(null);
}
function tover(){
  var req=new XMLHttpRequest();
  req.onreadystatechange=function(){
    if(this.readyState==4 && this.status==200){
      note.style.display="block";
      note.innerHTML=this.responseText;
    }
  }
  req.open("get","assets/pg/vbook.php?");
  req.send(null);
}
function clform(){
  note.style.display="none";
  //form2.innerHTML='<div class="col-sm-12 prof btnbook" onclick="toform()">booking</div>';
}
function tes(q){
  alert("tes"+q);
}
function getjam(q){
  var mulai=document.getElementById("mulai");
  var req=new XMLHttpRequest();
  req.onreadystatechange=function(){
    if(this.readyState==4 && this.status==200){
      mulai.innerHTML=this.responseText;
    }
  }
  req.open("get","assets/pg/jam.php?q="+q);
  req.send(null);
}
function getjam2() {
  var mulai=document.getElementById("mulai");
  var q=mulai.options[mulai.selectedIndex].value;
  var selesai=document.getElementById("selesai");
  var req=new XMLHttpRequest();
  req.onreadystatechange=function(){
    if(this.readyState==4 && this.status==200){
      selesai.innerHTML=this.responseText;
    }
  }
  req.open("get","assets/pg/jam.php?q="+q);
  req.send(null);
}
function getharga() {
  var mulai=document.getElementById("mulai");
  var q=mulai.options[mulai.selectedIndex].value;
  var selesai=document.getElementById("selesai");
  var r=selesai.options[selesai.selectedIndex].value;
  var jam=r-q;
  var lap=document.getElementById("lap");
  var vlap=lap.options[lap.selectedIndex].value;
  if(vlap=="A" || vlap=="B") var hlap=150000;
  else var hlap=125000;
  var harga=hlap*jam;
  var dp=20/100*harga;
  var iharga=document.getElementById("harga");
  var idp=document.getElementById("dp");
  iharga.value=harga;
  idp.value=dp;
}