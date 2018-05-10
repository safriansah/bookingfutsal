<?php
class Berita{
    var $tabel="BERITA";
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=futsal','root','');
    }
    
    public function add($admin, $judul, $konten, $gambar){
        $sql = "INSERT INTO $this->tabel (ID_ADMIN, JUDUL, TGL, KONTEN, GAMBAR, VIEW) VALUES ('$admin', '$judul', NOW(), '$konten', '$gambar', 0)";
        $query = $this->db->query($sql);
        if(!$query){
            return "0";
        }
        else{
            return "1";
        }
    }

    public function edit($kode){
        $sql = "SELECT a.*,b.NAMA_ADMIN FROM $this->tabel a, ADMIN b where a.ID_ADMIN=b.ID_ADMIN and KD_BERITA='$kode'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function update($kode,$judul, $konten, $gambar){
        $sql = "UPDATE $this->tabel SET JUDUL='$judul', KONTEN='$konten', GAMBAR='$gambar' WHERE KD_BERITA='$kode'";
        $query = $this->db->query($sql);
        if(!$query){
            return "0";
        }
        else{
            return "1";
        }   
    }

    public function show(){
        $sql = "SELECT a.*,b.NAMA_ADMIN FROM $this->tabel a, ADMIN b where a.ID_ADMIN=b.ID_ADMIN order by TGL desc";
        $query = $this->db->query($sql);
        return $query;
    }

    public function show2($id){
        $sql = "SELECT a.*,b.NAMA_ADMIN FROM $this->tabel a, ADMIN b where a.ID_ADMIN=b.ID_ADMIN and a.ID_ADMIN=$id order by TGL desc";
        $query = $this->db->query($sql);
        return $query;
    }

    public function limit($q){
        $sql = "SELECT * FROM $this->tabel order by TGL desc limit $q";
        $query = $this->db->query($sql);
        return $query;
    }

    public function pop($q){
        $sql = "SELECT * FROM $this->tabel order by VIEW desc limit $q";
        $query = $this->db->query($sql);
        return $query;
    }

    public function delete($kode){
        $sql = "DELETE FROM $this->tabel WHERE KD_BERITA='$kode'";
        $query = $this->db->query($sql);
        if(!$query){
            return "0".$sql;
        }
        else{
            return "1";
        }
    }

    public function cari($kode){
        $sql = "SELECT * FROM $this->tabel WHERE JUDUL like '%$kode%' or KONTEN like '%$kode%'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function view($kode){
        $sql = "UPDATE $this->tabel SET view=(view+1) WHERE KD_BERITA='$kode'";
        $query = $this->db->query($sql);
    }

    public function count(){
        $sql = "SELECT COUNT(*)as jum FROM $this->tabel";
        $query = $this->db->query($sql);
        return $query; 
    }
}
?>
