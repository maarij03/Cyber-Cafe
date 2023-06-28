<?php

include '../config.php';
$DB = new Database();


if(isset($_POST['login'])){
    $DB = new Database();
    if(!isset($_POST['u_name']) || $_POST['u_name'] == ''){
        echo 'Username is Required'; exit;
    }elseif(!isset($_POST['u_pass']) || $_POST['u_pass'] == ''){
        echo 'Password is Required'; exit;
    }else{
        $user = trim(stripslashes($_POST['u_name']));
        $pass = trim(stripslashes(md5($_POST['u_pass'])));
        
        $sql = $DB->select('admin','*',null,"username='{$user}' AND password='{$pass}'",null,null);
        $result = $DB->getResult();
        if(isset($result) && !empty($result)){
            if(!session_id()){ session_start(); }
            $_SESSION["id"] = $result[0]['id'];
            $_SESSION["username"] = $result[0]['admin_name'];
            echo '1'; exit;
        }else{
            echo 'Username and Password Not Matched'; exit;
        }
    }
}

if(isset($_POST['update'])){
    if(!isset($_POST['admin_name']) || $_POST['admin_name'] == ''){
        echo 'Admin Name is Required'; exit;
    }elseif(!isset($_POST['admin_user']) || $_POST['admin_user'] == ''){
        echo 'Admin Username is Required'; exit;
    }elseif(!isset($_POST['email']) || $_POST['email'] == ''){
        echo 'Admin Email is Required'; exit;
    }elseif(!isset($_POST['com_name']) || $_POST['com_name'] == ''){
        echo 'Company Name is Required'; exit;
    }else{
        $id = $_POST['id'];
        $admin_name = trim(stripslashes($_POST['admin_name']));
        $admin_user = trim(stripslashes($_POST['admin_user']));
        $email = trim(stripslashes($_POST['email']));
        $com_name = trim(stripslashes($_POST['com_name']));
        $value = ["admin_name"=>$admin_name,"username"=>$admin_user,"admin_email"=>$email,'com_name'=>$com_name];
        $update = $DB->update("admin",$value,"id='{$id}'");
        if($update == '1'){
            echo '1'; exit;
        }else{
            echo 'Data is not Updated. Error Occured in Updation.'; exit;
        }
    }
}


if(isset($_POST['change'])){
    if(!isset($_POST['old_pass']) || $_POST['old_pass'] == ''){
        echo 'Old Password is Required'; exit;
    }else if(!isset($_POST['new_pass']) || $_POST['new_pass'] == ''){
        echo 'New Password is Required'; exit;
    }else{
        $old = $_POST['old_pass'];
        $new = $_POST['new_pass'];
        if(!session_id()){ session_start(); }
        $id = $_SESSION['id'];
        $DB->select('admin','password',null,"id='{$id}'",null,null);
        $check = $DB->getResult();

        if($check[0]['password'] == md5($old)){
            $update = $DB->update("admin",['password'=>md5($new)],"id='{$id}'");
            if($update == '1'){
                echo '1'; exit;
            }else{
                echo 'Password Not Updated. Error Occured in Updation.'; exit;
            }
        }else{
            echo 'Enter Correct Old Password'; exit;
        }



    }




    if(isset($_POST['old_pass']) && isset($_POST['new_pass'])){
        $old = $_POST['old_pass'];
        $new = $_POST['new_pass'];
        $id = $_POST['id'];
        if($old == '' || $new == ''){
            echo '<div class="alert alert-light" role="alert">
                    Please Fill All The Fields
                  </div>';
        }else{
            $id = (trim(stripslashes($id)));
            $old = trim(stripslashes(md5($_POST['old_pass'])));
            $new = trim(stripslashes(md5($_POST['new_pass'])));

            $DB->select('admin','*',null,"password='{$old}'",null,null);
            $result = $DB->getResult();
           // print_r($result);
            $value = ["password"=>$old,"password"=>$new];
            //  print_r($value);
            $update = $DB->update("admin",$value,"id='{$id}'");
            if($update == '1'){
                header("Location:http://localhost/cyberCafe/login.php"); exit;
            }else{
                header("Location:http://localhost/cyberCafe/change_password.php"); exit;
            } 
        }
    }else{
        echo '<div class="alert alert-light" role="alert"> Please Fill All The Fields </div>';
    }
}