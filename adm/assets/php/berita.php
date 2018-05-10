<?php
include 'DB.php';
$db = new DB();
$tblName = 'BERITA';
$json=file_get_contents("php://input");
$data = json_decode($json);

if(isset($data->type) && !empty($data->type)){
    $type = $data->type;
    switch($type){
        case "Update":
            if(!empty($data)){
                $userData = array(
                    'ID_ADMIN' => $data->id,
                    'STATUS' => $data->sts_book
                );
                $condition = array('KODE_BOOK' => $data->kd_book);
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
                $condition = array('KD_BERITA' => $data->id);
                $res['data'] = $db->getRows($tblName,array('where'=>array('KD_BERITA' => $data->id)));
                $delete = $db->delete($tblName,$condition);
                if($delete){
                    $res['status'] = 'OK';
                    $res['msg'] = 'Data has been deleted successfully.';
                    if($res['data']['0']['GAMBAR']) unlink("../../../assets/img/".$res['data']['0']['GAMBAR']);
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