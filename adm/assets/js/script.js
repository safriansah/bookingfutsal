var note=document.getElementById("note");

function tocdel(p,q,r){
    var req=new XMLHttpRequest();
    req.onreadystatechange=function(){
      if(this.readyState==4 && this.status==200){
        note.style.display="block";
        note.innerHTML=this.responseText;
      }
    }
    req.open("get","assets/pg/"+p+"/cdel.php?q="+q+"&r="+r);
    req.send(null);
}

function nocdel(){
    note.style.display="none";
}

function tonote(q){
    note.style.display="block";
    note.innerHTML="tes";
}