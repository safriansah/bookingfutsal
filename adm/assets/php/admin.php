<?php
include 'DB.php';
$db = new DB();
$tblName = 'ADMIN';
$json=file_get_contents("php://input");
$data = json_decode($json);

if(isset($data->type) && !empty($data->type)){
    $type = $data->type;
    switch($type){
        case "Add":
            if(!empty($data)){
                $userData = array(
                    'ID_ADMIN' => $data->id_admin,
                    'NAMA_ADMIN' => $data->nama_admin,
                    'ALAMAT' => $data->alamat_admin,
                    'TELP' => $data->telp_admin,
                    'GENDER' => $data->gender_admin,
                    'PASSWORD' => md5($data->pass),
                    'TIPE'=>'1'
                );
                $insert = $db->insert($tblName,$userData);
                if($insert){
                    $res['data'] = $insert;
                    $res['status'] = 'OK';
                    $res['msg'] = 'Data has been added successfully.';
                }else{
                    $res['status'] = 'ERR';
                    $res['msg'] = 'Some problem occurred, please try again.';
                }
            }else{
                $res['status'] = 'ERR';
                $res['msg'] = 'Some problem occurred, please try again.';
            }
            echo json_encode($res);
            break;
        case "Update":
            if(!empty($data)){
                $userData = array(
                    'ID_ADMIN' => $data->id_admin,
                    'NAMA_ADMIN' => $data->nama_admin,
                    'ALAMAT' => $data->alamat_admin,
                    'TELP' => $data->telp_admin,
                    'GENDER' => $data->gender_admin
                );
                if(!empty($data->pass)){
                    $userData = array(
                        'ID_ADMIN' => $data->id_admin,
                        'NAMA_ADMIN' => $data->nama_admin,
                        'ALAMAT' => $data->alamat_admin,
                        'TELP' => $data->telp_admin,
                        'GENDER' => $data->gender_admin,
                        'PASSWORD'=>md5($data->pass)
                    );
                } 
                $condition = array('ID_ADMIN' => $data->id_admin);
                $update = $db->update($tblName,$userData,$condition);
                if($update){
                    $res['status'] = 'OK';
                    $res['msg'] = 'Data has been updated successfully.';
                }else{
                    $res['status'] = 'ERR';
                    $res['msg'] = 'Some problem occurred, please try again.';
                }
            }else{
                $res['status'] = 'ERR';
                $res['msg'] = 'Some problem occurred, please try again.';
            }
            echo json_encode($res);
            break;
        case "delete":
            if(!empty($data->id)){
                $condition = array('ID_ADMIN' => $data->id);
                $delete = $db->delete($tblName,$condition);
                if($delete){
                    $res['status'] = 'OK';
                    $res['msg'] = 'Data has been deleted successfully.';
                }else{
                    $res['status'] = 'ERR';
                    $res['msg'] = 'Some problem occurred, please try again.';
                }
            }else{
                $res['status'] = 'ERR';
                $res['msg'] = 'Some problem occurred, please try again.';
            }
            echo json_encode($res);
            break;
        default:
            echo '{"status":"INVALID"}';
    }
}