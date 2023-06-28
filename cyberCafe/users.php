<?php $title = 'Users';
include 'header.php'; ?>  
<?php include 'sidebar.php'; ?>  
<!-- MAIN CONTENT-->
<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
<div class="row mb-3">
    <div class="col-md-12">
        <div class="overview-wrap">
        <h2 class="title-1">Users</h2>
            <a href="add_user.php" class="au-btn au-btn-icon au-btn--green au-btn--small text-white">
                <i class="zmdi zmdi-plus"></i>
                Add User
            </a>
        </div>
    </div>
</div>
<?php
$DB = new Database();
$status = '0';
$where = '';
if(isset($_GET['status']) && $_GET['status'] != ''){
        $status = $_GET['status'];
}
if($status != 'all'){
    $where .= "users.status={$status}";
}
$DB->select('users','users.user_id,users.entry_id,users.username,users.email,users.phone,users.In_time,users.out_time,users.status,computer.computer_name',"computer ON computer.computer_id = users.computer",$where,null,null);
$result = $DB->getResult();
?>
<div class="row">
    <div class="col-md-12">
        <div class="card table-responsive px-3 pb-3">
            <div class="card-header mb-3 px-0 d-flex ">
                <strong>Users List</strong>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="ml-auto w-auto">
                    <select name="status" class="form-control" onChange="form.submit()">
                        <option value="0" <?php echo ($status == '0') ? 'selected' : '';  ?>>Check In Users</option>
                        <option value="1" <?php echo ($status == '1') ? 'selected' : '';  ?> >Check Out Users</option>
                        <option value="all" <?php echo ($status == 'all') ? 'selected' : '';  ?>>All Users</option>
                    </select>
                </form>
            </div>
        
            <table id="showData" class='table table-bordered'>
                <thead class="thead-dark">
                    <tr>
                        <th>S. No.</th>
                        <th>Entry ID</th>
                        <th>User Details</th>
                        <th>Computer</th>
                        <th>Timings</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($result as list("user_id"=>$id,"entry_id"=>$entry_id,"username"=>$username,"email"=>$email,"phone"=>$phone,"status"=>$status,'computer_name'=>$computer,'In_time'=>$in_time,'out_time'=>$out_time)) { 
                        $i++?>
                    <tr class='tr-shadow'>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $entry_id; ?></td>
                        <td>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item p-0">Name: <?php echo $username; ?></li>
                                <li class="list-group-item p-0">Email: <?php echo $email; ?></li>
                                <li class="list-group-item p-0">Phone: <?php echo $phone; ?></li>
                                <li class="list-group-item p-0">Status: <?php if($status == "1"){
                            echo "<span class='status--process'>Check Out</span>";
                        }else{
                            echo"<span class='status--denied'>Check In</span>";
                        } ?></li>
                            </ul>
                        </td>
                        <td><?php echo $computer; ?></td>
                        <td><?php echo date('d M, Y',strtotime($in_time)); ?> <br>
                        <?php echo date('H:i A',strtotime($in_time)); ?> -
                        <?php echo ($out_time != '') ? date('H:i A',strtotime($out_time)) : 'running'; ?>
                        </td>
                        <td>
                            <div class='table-data-feature'>
                                <?php if($status == '0'){ ?>
                                <button class='item' data-toggle='tooltip' data-placement='top' title='Edit'>
                                    <a style='color:#fff;' href='edit_user.php?user_id=<?php echo $id; ?>'><i class='zmdi zmdi-edit'></i></a>
                                </button>
                                <?php } ?>
                                <?php if($status == '1'){ ?>
                                <button class='item' data-toggle='tooltip' data-placement='top' title='View'>
                                <a style='color:#fff;' href='view_user.php?user_id=<?php echo $id; ?>'><i class='zmdi zmdi-eye'></i></a>
                                </button>
                                <?php } ?>
                                <button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>
                                    <a style='color:#fff;' href='delete_user.php?user_id=<?php echo $id; ?>'> <i class='zmdi zmdi-delete'></i></a>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>  
