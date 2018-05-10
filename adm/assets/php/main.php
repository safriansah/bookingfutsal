<?php
include 'DB.php';
$db = new DB();
$tblName = $_REQUEST['tabl'];

if(isset($_REQUEST['type']) && !empty($_REQUEST['type'])){
    $type = $_REQUEST['type'];
    switch($type){
        case "view":
            $records = $db->getRows($tblName);
            if($records){
                $data['records'] = $db->getRows($tblName);
                $data['status'] = 'OK';
            }else{
                $data['records'] = array();
                $data['status'] = 'ERR';
            }
            echo json_encode($data);
            break;
        case "jumlah":
            $records = $db->getRows($tblName);
            if($records){
                $data['records'] = $db->getRows($tblName,array('return_type'=>'count'));
                if(isset($_REQUEST['where']) && !empty($_REQUEST['where'])) $data['records'] = $db->getRows($tblName,array('return_type'=>'count','where'=>array($_REQUEST['key']=>$_REQUEST['val'])));
                $data['status'] = 'OK';
            }else{
                $data['records'] = array();
                $data['status'] = 'ERR';
            }
            echo json_encode($data);
            break;
        case "group":
            $records = $db->getRows($tblName);
            if($records){
                $data['records'] = $db->getGroupLap($tblName);
                if(isset($_REQUEST['cond']) && !empty($_REQUEST['cond'])){
                    $a=date('m');
                    $b=date('Y');
                    $c=$a+1;
                    $d=$b;
                    $e=$b+1;
                    if($c>12){
                        $c='01';
                        $d+=1;
                    }
                    $ba="$b-$a-01";
                    $bb="$d-$c-01";
                    $bat="$b-01-01";
                    $bbt="$e-01-01";
                    if($_REQUEST['cond']=='tahun'){
                        $data['records'] = $db->getGroupLap($tblName,$bat,$bbt);
                    }
                    else if($_REQUEST['cond']=='bulan'){
                        $data['records'] = $db->getGroupLapSpes($tblName,$ba,$bb);
                    }
                } 
                $data['status'] = 'OK';
            }else{
                $data['records'] = array();
                $data['status'] = 'ERR';
            }
            echo json_encode($data);
            break;    
        case "add":
            if(!empty($_POST['data'])){
                $userData = array(
                    'name' => $_POST['data']['name'],
                    'email' => $_POST['data']['email'],
                    'phone' => $_POST['data']['phone']
                );
                $insert = $db->insert($tblName,$userData);
                if($insert){
                    $data['data'] = $insert;
                    $data['status'] = 'OK';
                    $data['msg'] = 'Data has been added successfully.';
                }else{
                    $data['status'] = 'ERR';
                    $data['msg'] = 'Some problem occurred, please try again.';
                }
            }else{
                $data['status'] = 'ERR';
                $data['msg'] = 'Some problem occurred, please try again.';
            }
            echo json_encode($data);
            break;
        case "edit":
            if(!empty($_POST['data'])){
                $userData = array(
                    'name' => $_POST['data']['name'],
                    'email' => $_POST['data']['email'],
                    'phone' => $_POST['data']['phone']
                );
                $condition = array('id' => $_POST['data']['id']);
                $update = $db->update($tblName,$userData,$condition);
                if($update){
                    $data['status'] = 'OK';
                    $data['msg'] = 'Data has been updated successfully.';
                }else{
                    $data['status'] = 'ERR';
                    $data['msg'] = 'Some problem occurred, please try again.';
                }
            }else{
                $data['status'] = 'ERR';
                $data['msg'] = 'Some problem occurred, please try again.';
            }
            echo json_encode($data);
            break;
        case "delete":
            if(!empty($_POST['id'])){
                $condition = array('id' => $_POST['id']);
                $delete = $db->delete($tblName,$condition);
                if($delete){
                    $data['status'] = 'OK';
                    $data['msg'] = 'Data has been deleted successfully.';
                }else{
                    $data['status'] = 'ERR';
                    $data['msg'] = 'Some problem occurred, please try again.';
                }
            }else{
                $data['status'] = 'ERR';
                $data['msg'] = 'Some problem occurred, please try again.';
            }
            echo json_encode($data);
            break;
        default:
            echo '{"status":"INVALID"}';
    }
}