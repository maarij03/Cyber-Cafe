<?php

include '../config.php';
$DB = new Database();
// print_r($_POST); exit;
if(isset($_POST['type']) && $_POST['type'] != ''){
    $search_type = $_POST['type'];
    $from_date = $_POST['from_date'].' 00:00:00';
    $to_date = date('Y-m-d H:i:s', strtotime($_POST['to_date'] . ' +1 day'));
    $where = "users.In_time >='{$from_date}' AND users.In_time <='{$to_date}'";
    if($search_type == 'all'){
        $where .= '';
    }elseif($search_type == 'id_proof'){
        if(!isset($_POST['id_type']) || $_POST['id_type'] == ''){
            echo '<p class="alert alert-danger">Select ID Type</p>'; exit;
        }elseif(!isset($_POST['id_value']) || $_POST['id_value'] == ''){
            echo '<p class="alert alert-danger">Enter ID Number</p>'; exit;
        }else{
            $id_type = $_POST['id_type'];
            $id_value = $_POST['id_value'];
            $where .= " AND users.id_proof='{$id_type}' AND id_proof_value='{$id_value}'";
        }
    }elseif($search_type == 'user_name'){
        if(!isset($_POST['user_name']) || $_POST['user_name'] == ''){
            echo '<p class="alert alert-danger">Enter User Name</p>'; exit;
        }else{
            $user_name = $_POST['user_name'];
            $where .= " AND users.username LIKE '%{$user_name}'";
        }
    }
    $DB->select('users','users.user_id,users.entry_id,users.username,users.email,users.phone,users.In_time,users.out_time,users.status,users.fees,computer.computer_name',"computer ON computer.computer_id = users.computer",$where,null,null);
    $result = $DB->getResult();
    // print_r($result); exit;
    $output = [];
    foreach($result as $row){
        $user_details = '<ul class="list-group list-group-flush">
        <li class="list-group-item p-0">Name: '.$row['username'].'</li>
        <li class="list-group-item p-0">Email: '.$row['email'].'</li>
        <li class="list-group-item p-0">Phone: '.$row['phone'] .'</li>
        <li class="list-group-item p-0">Status: ';
        if($row['status'] == "1"){
        $user_details .= '<span class="status--process">Check Out</span>';
        }else{
        $user_details .= '<span class="status--denied">Check In</span>';
        }
        $user_details .= `</li>
        </ul>`;
        $row['user_details'] = $user_details;
        $row['timings'] = date('d M, Y',strtotime($row['In_time'])).'<br>'.date('H:i A',strtotime($row['In_time'])).'-';
        if($row['out_time'] != '0000-00-00 00:00:00'){
            $row['timings'] .= date('H:i A',strtotime($row['out_time']));
        }else{
            $row['timings'] .= ' running';
        }
        array_push($output,$row);
    }
    $dataset = array(
        "totalrecords" => count($result),
        "totaldisplayrecords" => count($result),
        "data" => $output,
    );
    echo json_encode($dataset); exit;
}

?>
