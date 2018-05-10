<?php
class Admin{
    var $tabel="ADMIN";
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=futsal','root','');
    }
    
    public function add($idadmin, $nama, $alamat, $telp, $gender, $pass, $tipe){
        $sql = "INSERT INTO `ADMIN`(`ID_ADMIN`, `NAMA_ADMIN`, `ALAMAT`, `TELP`, `GENDER`, `PASSWORD`, `TIPE`) VALUES ('$idadmin', '$nama', '$alamat', '$telp', '$gender',md5('$pass'),'$tipe')";
        $query = $this->db->query($sql);
        if(!$query){
            return "0".$sql;
        }
        else{
            return "1";
        }
    }

    public function edit($idadmin){
        $sql = "SELECT * FROM $this->tabel WHERE ID_ADMIN='$idadmin'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function login($idadmin, $pass){
        $sql = "SELECT * FROM $this->tabel WHERE ID_ADMIN='$idadmin' and PASSWORD=md5('$pass')";
        $query = $this->db->query($sql);
        return $query;
    }

    public function update($idadmin, $nama, $alamat, $telp, $gender){
        $sql = "UPDATE $this->tabel SET NAMA_ADMIN='$nama', ALAMAT='$alamat', TELP='$telp', GENDER='$gender' WHERE ID_ADMIN='$idadmin'";
        $query = $this->db->query($sql);
        if(!$query){
            return "0";
        }
        else{
            return "1";
        }   
    }

    public function pass($idadmin, $pass){
        $sql = "UPDATE $this->tabel SET PASSWORD=md5('$pass') WHERE ID_ADMIN='$idadmin'";
        $query = $this->db->query($sql);
        if(!$query){
            return "0";
        }
        else{
            return "1";
        }   
    }

    public function show(){
        $sql = "SELECT * FROM $this->tabel";
        $query = $this->db->query($sql);
        return $query;
    }

    public function delete($idadmin){
        $sql = "DELETE FROM $this->tabel WHERE ID_ADMIN='$idadmin'";
        $query = $this->db->query($sql);
        if(!$query){
            return "0";
        }
        else{
            return "1";
        }
    }

    public function count(){
        $sql = "SELECT COUNT(*)as jum FROM $this->tabel";
        $query = $this->db->query($sql);
        return $query; 
    }
}
?>