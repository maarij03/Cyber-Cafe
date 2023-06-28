<?php
    include "../config.php";
    $DB = new Database();


    if(isset($_POST['submit'])){
        if(!isset($_POST['id_name']) || $_POST['id_name'] == ''){
            echo 'ID Name is Required.'; exit;
        }elseif(!isset($_POST['status']) || $_POST['status'] == ''){
            echo 'Select Status'; exit;
        }else{
            $name = trim(stripslashes($_POST['id_name']));
            $status = trim(stripslashes($_POST['status']));

            $DB->select('id_types','id',null,"name='{$name}'",null,null);
            $check = $DB->getResult();

            if(empty($check)){
                $value = ["name"=>$name,"status"=>$status];
                $insert = $DB->insert("id_types",$value);
                if($insert == '1'){
                    echo '1'; exit;
                }else{
                    echo 'Data not Inserted. Error in Insertion.'; exit;
                }
            }else{
                echo 'ID Name Already Exists'; exit;
            }
        }
    }

    if(isset($_POST['update'])){
        if(!isset($_POST['id_name']) || $_POST['id_name'] == ''){
            echo 'ID Name is Required.'; exit;
        }elseif(!isset($_POST['status']) || $_POST['status'] == ''){
            echo 'Select Status'; exit;
        }else{
            $id = trim(stripslashes($_POST['id']));
            $name = trim(stripslashes($_POST['id_name']));
            $status = trim(stripslashes($_POST['status']));

            $DB->select('id_types','id',null,"name='{$name}' AND id != '{$id}'",null,null);
            $check = $DB->getResult();

            if(empty($check)){
                $value = ["name"=>$name,"status"=>$status];
                $update = $DB->update("id_types",$value,"id='{$id}'");
                if($update == '1'){
                    echo '1'; exit;
                }else{
                    echo 'Data not Updated. Error in Updation.'; exit;
                }
            }else{
                echo 'ID Name Already Exists'; exit;
            }
        }
    }

    if(isset($_POST['delete'])){
        $id = $_POST['delete'];
        $sql = $DB->delete('id_types',"id='{$id}'");
        if( $sql == '1'){
            echo '1'; exit;
        }else{
            echo 'Data not Deleted. Error in Deletion.'; exit;
        }
    }

?>