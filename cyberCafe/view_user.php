<?php $title = 'View User Detail';
include 'header.php'; ?>  
<?php include 'sidebar.php'; ?> 
<!-- MAIN CONTENT-->
<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
<div class="row mb-3">
    <div class="col-md-12">
        <div class="overview-wrap">
        <h2 class="title-1">View User</h2>
            <a href="users.php" class="au-btn au-btn-icon au-btn--green au-btn--small text-white">
                <i class="fa fa-list"></i>
                All Users
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>View User Detail</strong>
            </div>
            <?php
            $DB = new Database();
            $user_id = $_GET['user_id'];
            $DB->select('users','users.user_id,users.entry_id,users.username,users.email,users.phone,users.address,users.Id_proof,users.id_proof_value,users.In_time,users.out_time,users.fees,users.remark,users.status,computer.computer_name,id_types.name as id_name',"computer ON computer.computer_id = users.computer LEFT JOIN id_types ON id_types.id = users.id_proof","users.user_id='{$user_id}'",null,null);
            $result = $DB->getResult(); ?>
            <div class="card-body">
                <table class="table table-bordered">
                    <?php foreach($result as $row){ ?>
                    <tr>
                        <th>Entry ID</th>
                        <td><?php echo $row['entry_id']; ?></td>
                    </tr>
                    <tr>
                        <th>User Name</th>
                        <td><?php echo $row['username']; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td><?php echo $row['phone']; ?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><?php echo $row['address']; ?></td>
                    </tr>
                    <tr>
                        <th>Computer</th>
                        <td><?php echo $row['computer_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Date and Timings</th>
                        <td><?php echo date('d M, Y',strtotime($row['In_time'])); ?> <br>
                    <?php echo date('H:i A',strtotime($row['In_time'])); ?> -
                    <?php echo date('H:i A',strtotime($row['out_time'])); ?></td>
                    </tr>
                    <tr>
                        <th>ID Proof</th>
                        <td><?php echo $row['id_name'].' : '.$row['id_proof_value']; ?></td>
                    </tr>
                    <tr>
                        <th>Fees</th>
                        <td><?php echo $row['fees']; ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><?php echo ($row['status'] == '1') ? 'Check Out' : 'Check In'; ?></td>
                    </tr>
                    <tr>
                        <th>Remarks</th>
                        <td><?php echo $row['remark']; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>  