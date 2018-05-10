<?php
if($_SESSION['tipe']!='0' && $_GET["kode"]!=$_SESSION['id']) header('Location:admin-upd-'.$_SESSION['id']);
include "../assets/php/admin.php"; 
$a=$_GET["kode"];
$obj=new Admin();
$res=$obj->edit($a);
$data = $res->fetch(PDO::FETCH_OBJ);
?>

    <h1 style="text-align:center">Form Update Data Admin</h1>
    <form method="post" action="assets/act/admin/add.php?q=upd">
        <table class="tab">
        <input type="input" hidden readonly value="<?php echo $_SESSION['tipe']; ?>" name="tipe" required>
        <tr>
            <td>ID Admin</td>
            <td>:</td>
            <td><input type="input" readonly value="<?php echo $data->ID_ADMIN; ?>" name="id_admin" required maxlength="8"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="input" value="<?php echo $data->NAMA_ADMIN; ?>" name="nama_admin" required maxlength="32"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><input type="input" value="<?php echo $data->ALAMAT; ?>" name="alamat_admin" required maxlength="64"></td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td>:</td>
            <td><input type="number" value="<?php echo $data->TELP; ?>" name="telp_admin" required maxlength="16"></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
                <select name="gender_admin" required>
                <option value="">Pilih Gender</option>
                <option value="1" <?php if($data->GENDER==1) echo "selected"; ?>>Laki-laki</option>
                <option value="2" <?php if($data->GENDER==2) echo "selected"; ?>>Perempuan</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="input" placeholder="Kosongkan Jika Tidak Diganti" name="pass" maxlength="32"></td>
        </tr>
        <tr>
            <td><?php if($_SESSION['tipe']=='0'){?><a href="admin"><input type="button" value="<-"></a><?php }?></td>
            <td></td>
            <td><input style="float:right" type="submit" value="Update"></td>
        </tr>        
    </table>
    </form>