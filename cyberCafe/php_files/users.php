<?php

include '../config.php';
$DB = new Database();


if(isset($_POST['submit'])){
    if(!isset($_POST['user_name']) || $_POST['user_name'] == ''){
        echo 'User Name is Required.'; exit;
    }elseif(!isset($_POST['email']) || $_POST['email'] == ''){
        echo 'Email is Required.'; exit;
    }elseif(!isset($_POST['phone']) || $_POST['phone'] == ''){
        echo 'Phone Number is Required.'; exit;
    }elseif(!isset($_POST['address']) || $_POST['address'] == ''){
        echo 'Address is Required.'; exit;
    }elseif(!isset($_POST['computer']) || $_POST['computer'] == ''){
        echo 'Select Computer.'; exit;
    }elseif(!isset($_POST['id_type']) || $_POST['id_type'] == ''){
        echo 'Select Id Type.'; exit;
    }elseif(!isset($_POST['id_value']) || $_POST['id_value'] == ''){
        echo 'Id Proof Number is Empty.'; exit;
     }elseif(!isset($_POST['in_time']) || $_POST['in_time'] == ''){
        echo 'Select Check In Time.'; exit;
    }else{
        
        $entry_id= rand(); // Generating a random number
        $username = trim(stripslashes($_POST['user_name']));
        $email = trim(stripslashes($_POST['email']));
        $phone = trim(stripslashes($_POST['phone']));
        $address = trim(stripslashes($_POST['address']));
        $computer = trim(stripslashes($_POST['computer']));
        $id_type = trim(stripslashes($_POST['id_type']));
        $id_value = trim(stripslashes($_POST['id_value']));
        $in_time = trim(stripslashes($_POST['in_time']));
                  
        $value = ["entry_id"=>$entry_id,"username"=>$username,"email"=>$email,"phone"=>$phone,"address"=>$address,"computer"=>$computer,"id_proof"=>$id_type,"id_proof_value"=>$id_value,"in_time"=>$in_time];
        $insert = $DB->insert("users",$value); 
        if($insert == '1'){
            $value = ["status"=>0];
            $update = $DB->update("computer",$value,"computer_id='{$_POST['computer']}'");
            echo '1'; exit;
        }else{
            echo 'Data not Inserted. Error in Insertion.'; exit;
        }
    }
}

if(isset($_POST['update'])){
    if(!isset($_POST['user_name']) || $_POST['user_name'] == ''){
        echo 'User Name is Required.'; exit;
    }elseif(!isset($_POST['email']) || $_POST['email'] == ''){
        echo 'Email is Required.'; exit;
    }elseif(!isset($_POST['phone']) || $_POST['phone'] == ''){
        echo 'Phone Number is Required.'; exit;
    }elseif(!isset($_POST['address']) || $_POST['address'] == ''){
        echo 'Address is Required.'; exit;
    }elseif(!isset($_POST['computer']) || $_POST['computer'] == ''){
        echo 'Select Computer Name.'; exit;
    }elseif(!isset($_POST['id_type']) || $_POST['id_type'] == ''){
        echo 'Select ID Type.'; exit;
    }elseif(!isset($_POST['id_value']) || $_POST['id_value'] == ''){
        echo 'Id Proof Number is Required'; exit;
    }elseif(!isset($_POST['in_time']) || $_POST['in_time'] == ''){
        echo 'Check In time is Required'; exit;
    }elseif((!isset($_POST['out_time']) || $_POST['out_time'] == '') && $_POST['status'] == '1'){
        echo 'Check Out Time is Required'; exit;
    }elseif((!isset($_POST['fees']) || $_POST['fees'] == '') && $_POST['status'] == '1'){
        echo 'Fees is Required.'; exit;
    }elseif(($_POST['fees'] != '' || $_POST['out_time'] != '') && $_POST['status'] == '0'){
        echo 'Change Status to Check Out.'; exit;
    }elseif(($_POST['out_time'] != '') && $_POST['status'] == '0'){
        echo 'Change Status to Check Out.'; exit;
    }else{
        $user_id = $_POST['user_id'];
        $username = trim(stripslashes($_POST['user_name']));
        $email = trim(stripslashes($_POST['email']));
        $phone = trim(stripslashes($_POST['phone']));
        $address = trim(stripslashes($_POST['address']));
        $computer = trim(stripslashes($_POST['computer']));
        $id_type = trim(stripslashes($_POST['id_type']));
        $id_value = trim(stripslashes($_POST['id_value']));
        $in_time = trim(stripslashes($_POST['in_time']));
        $out_time = trim(stripslashes($_POST['out_time']));
        $fees = trim(stripslashes($_POST['fees']));
        $remark = trim(stripslashes($_POST['remark']));
        $status = $_POST['status'];
        // print_r($_POST); exit;
        $value = ["username"=>$username,"email"=>$email,"phone"=>$phone,"address"=>$address,"computer"=>$computer,"id_proof"=>$id_type,"id_proof_value"=>$id_value,"in_time"=>$in_time,"out_time"=>$out_time,"fees"=>$fees,"remark"=>$remark,"status"=>$status];
        $update = $DB->update("users",$value,"user_id='{$user_id}'");
        if($update == '1'){
            if($status == '1'){
                $update2 = $DB->update("computer",["status"=>1],"computer_id='{$_POST['old_computer']}'");
            }else{
                if($_POST['computer'] != $_POST['old_computer']){
                    $update1 = $DB->update("computer",["status"=>1],"computer_id='{$_POST['old_computer']}'");
                    $update2 = $DB->update("computer",["status"=>0],"computer_id='{$_POST['computer']}'");
                }
            }
            echo '1'; exit;
        }else{
            echo 'Data not Updated. Error in Updation.'; exit;
        }
    }
}