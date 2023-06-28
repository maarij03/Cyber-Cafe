<?php 
$title = "Dashboard";
include 'header.php'; ?>  
<?php include 'sidebar.php'; ?> 
<?php $DB = new Database(); ?>
<!-- MAIN CONTENT-->
<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">overview</h2>
        </div>
    </div>
</div>
<div class="row m-t-25">
    <div class="col-sm-6 col-lg-4">
        <div class="overview-item overview-item--c1">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-account-o"></i>
                    </div>
                    <div class="text">
                        <?php  
                        $DB->select('users','*',null,"status=0",null,null);
                        $result = $DB->getResult(); 
                        $usercounts= COUNT($result);
                        ?>
                        <h2><?php echo $usercounts;?></h2>
                       <span>Active Users</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="overview-item overview-item--c2">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-laptop"></i>
                    </div>
                    <div class="text">
                        <?php  
                            $sql = $DB->select('computer','*');
                            $result = $DB->getResult(); 
                            $computercounts= COUNT($result);
                        ?>
                        <h2><?php echo $computercounts;?></h2>
                        <span>Computers</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="overview-item overview-item--c3">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-laptop"></i>
                    </div>
                    <div class="text">
                    <?php  
                        $DB->select('computer','*',null,"status=1",null,null);
                        $result = $DB->getResult(); 
                        $free_computers= COUNT($result);
                        ?>
                        <h2><?php echo $free_computers; ?></h2>
                        <span>Free Computers</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Active Users</h4>
            </div>
            <div class="card-body table-responsive">
                <?php
                $DB->select('users','users.user_id,users.entry_id,users.username,users.email,users.phone,users.In_time,users.out_time,users.status,computer.computer_name',"computer ON computer.computer_id = users.computer","users.status=0","users.user_id DESC",null);
                $result = $DB->getResult();
                ?>
                <table class='table table-bordered'>
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
                        <?php if(isset($result) && !empty($result)){
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
                                </div>
                            </td>
                        </tr>
                    <?php }
                    }else{ ?>
                        <tr>
                            <td colspan="6" align="center">No Record Found</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>  
