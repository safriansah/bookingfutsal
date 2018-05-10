<?php
class Booking{
    var $tabel="BOOKING";
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=futsal','root','');
    }
    
    public function add($kode, $admin, $lap, $team, $pemesan, $telp, $tglmain, $mulai, $selesai, $harga, $dp){
        $sql = "INSERT INTO `BOOKING`(`KODE_BOOK`, `ID_ADMIN`, `KODE_LAP`, `TGL_BOOK`, `JAM_BOOK`, `NAMA_TEAM`, `NAMA_PEMESAN`, `TELP`, `TGL_MAIN`, `START`, `END`, `HARGA`, `DP`, `STATUS`,TERBAYAR,SISA) VALUES ('$kode', '$admin', '$lap', NOW(), NOW(), '$team', '$pemesan', '$telp', '$tglmain', '$mulai', '$selesai', '$harga', '$dp', '0','0','$harga')";
        $query = $this->db->query($sql);
        if(!$query){
            return "0".$sql;
        }
        else{
            return "1";
        }
    }

    public function edit($kode){
        $sql = "SELECT * FROM $this->tabel WHERE KODE_BOOK='$kode'";
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function pilih($tgl,$start,$lap){
        $sql = "SELECT *,(END-START) as lama FROM $this->tabel WHERE TGL_MAIN='$tgl' and START='$start' and KODE_LAP='$lap'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function very($kode, $very, $id){
        $sql = "UPDATE $this->tabel SET STATUS='$very',ID_ADMIN='$id' WHERE KODE_BOOK='$kode'";
        $query = $this->db->query($sql);
        if(!$query){
            return "0";
        }
        else{
            return "1";
        }   
    }

    public function gambar($kode, $very, $bayar){
        $sql = "UPDATE $this->tabel SET GAMBAR='$very', TERBAYAR='$bayar', SISA=HARGA-$bayar WHERE KODE_BOOK='$kode'";
        $query = $this->db->query($sql);
        if(!$query){
            return "0";
        }
        else{
            return "1";
        }   
    }

    public function show(){
        $sql = "SELECT * FROM $this->tabel order by STATUS,TGL_BOOK desc,JAM_BOOK desc";
        $query = $this->db->query($sql);
        return $query;
    }

    public function show2($id){
        $sql = "SELECT * FROM $this->tabel where ID_ADMIN=$id or STATUS='0' order by TGL_BOOK,JAM_BOOK desc";
        $query = $this->db->query($sql);
        return $query;
    }

    public function delete($kode){
        $sql = "DELETE FROM $this->tabel WHERE KODE_BOOK='$kode'";
        $query = $this->db->query($sql);
        if(!$query){
            return "0";
        }
        else{
            return "1";
        }
    }
    
    public function cek($lap,$tgl,$start,$end){
        $sql = "SELECT COUNT(*)as jum FROM `BOOKING` WHERE KODE_LAP='$lap' AND TGL_MAIN='$tgl' AND (START>=$start AND START<$end) OR KODE_LAP='$lap' AND TGL_MAIN='$tgl' AND (END>$start AND END<=$end)";
        $query = $this->db->query($sql);
        $data = $query->fetch(PDO::FETCH_OBJ);
        if($data->jum < 1){
            $sql = "SELECT COUNT(*)as jum FROM `BOOKING` WHERE KODE_LAP='$lap' AND TGL_MAIN='$tgl' AND (START<=$start AND END>$start) OR KODE_LAP='$lap' AND TGL_MAIN='$tgl' AND (START<$end AND END>=$end)";
            $query = $this->db->query($sql);
            $data = $query->fetch(PDO::FETCH_OBJ);
            if($data->jum < 1){
                return "0";
            }
            else{
                return "1";
            }
        }
        else{
            return "1";
        }
    }
    
    public function count(){
        $sql = "SELECT COUNT(*)as jum FROM $this->tabel where STATUS='0'";
        $query = $this->db->query($sql);
        return $query; 
    }

    public function lap($lap,$ba,$bb){
        $sql = "SELECT COUNT(*)as jum,SUM(HARGA)as tot FROM $this->tabel where KODE_LAP='$lap' and TGL_BOOK>='$ba' and TGL_BOOK<'$bb' and STATUS='1'";
        $query = $this->db->query($sql);
        return $query; 
    }

    public function all($lap){
        $sql = "SELECT COUNT(*)as jum,SUM(HARGA)as tot FROM $this->tabel where KODE_LAP='$lap' and STATUS='1'";
        $query = $this->db->query($sql);
        return $query; 
    }
}
?>