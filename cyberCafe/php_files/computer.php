<?php
    include "../config.php";
    $DB = new Database();

    if(isset($_POST['submit'])){
        if(!isset($_POST['computer_name']) || $_POST['computer_name'] == ''){
            echo 'Computer Name is Required.'; exit;
        }elseif(!isset($_POST['computer_location']) || $_POST['computer_location'] == ''){
            echo 'Computer Location is Required.'; exit;
        }else{
            $computer_name = trim(stripslashes($_POST['computer_name']));
            $computer_location = trim(stripslashes($_POST['computer_location']));

            $DB->select('computer','computer_id',null,"computer_name='{$computer_name}'",null,null);
            $check = $DB->getResult();
            if(empty($check)){
                $value = ["computer_name"=>$computer_name,"computer_location"=>$computer_location];
                $insert = $DB->insert("computer",$value);
                if($insert == '1'){
                    echo '1'; exit;
                }else{
                    echo 'Data not Inserted. Error in Insertion.'; exit;
                }
            }else{
                echo 'Computer Name Already Exists'; exit;
            }

            
        }
    }

    if(isset($_POST['update'])){
        if(!isset($_POST['computer_name']) || $_POST['computer_name'] == ''){
            echo 'Computer Name is Required.'; exit;
        }elseif(!isset($_POST['computer_location']) || $_POST['computer_location'] == ''){
            echo 'Computer Location is Required.'; exit;
        }else{
            $id = trim(stripslashes($_POST['computer_id']));
            $computer_name = trim(stripslashes($_POST['computer_name']));
            $computer_location = trim(stripslashes($_POST['computer_location']));
            $status = trim(stripslashes($_POST['status']));

            $DB->select('computer','computer_id',null,"computer_name='{$computer_name}' AND computer_id != '{$id}'",null,null);
            $check = $DB->getResult();
            if(empty($check)){
                $value = ["computer_name"=>$computer_name,"computer_location"=>$computer_location,'status'=>$status];
                $update = $DB->update("computer",$value,"computer_id='{$id}'");
                if($update == '1'){
                    echo '1'; exit;
                }else{
                    echo 'Data not Updated. Error in Updation.'; exit;
                }
            }else{
                echo 'Computer Name Already Exists'; exit;
            }

            
        }
    }

    if(isset($_POST['delete'])){
        $id = $_POST['delete'];
        $DB->select('computer','computer_id',null,"computer_id='{$id}' AND status=0",null,null);
        $check = $DB->getResult();
        if(isset($check) && !empty($check)){
            echo "You won't delete this. This Computer has active user."; exit;
        }else{
            $sql = $DB->delete('computer',"computer_id='{$id}'");
            if( $sql == '1'){
                echo '1'; exit;
            }else{
                echo 'Data not Deleted. Error in Deletion.'; exit;
            }
        }
    }

    


