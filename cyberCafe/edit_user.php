<?php $title = 'Edit User';
include 'header.php'; ?>  
<?php include 'sidebar.php'; ?> 
<!-- MAIN CONTENT-->
<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
<div class="row mb-3">
    <div class="col-md-12">
        <div class="overview-wrap">
        <h2 class="title-1">Edit User</h2>
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
                <strong>Edit User Detail</strong>
            </div>
            <?php
                $DB = new Database();
                $user_id =$_GET['user_id'];
                $DB->select('users','users.user_id,users.username,users.email,users.phone,users.address,users.computer,users.id_proof,users.id_proof_value,users.In_time,users.out_time,users.status,computer.computer_name',"computer ON computer.computer_id = users.computer","user_id='{$user_id}'",null,null);
                $result = $DB->getResult();
                foreach ($result as $row){
            ?>
            <form id="updateUser" method="POST" class="form-horizontal">
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="form-control-label">User Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" hidden name="user_id" value="<?php echo $row['user_id'] ?>">
                            <input type="text" name="user_name" value="<?php echo $row['username'] ?>" placeholder="Enter User Name" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label type="email" class="form-control-label">Email</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="email" name="email" value="<?php echo $row['email'] ?>" placeholder="Enter User Email" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label type="number" class="form-control-label">Phone</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" name="phone" value="<?php echo $row['phone'] ?>" placeholder="Enter User Phone Number" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label type="text" class="form-control-label">Address</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="address" value="<?php echo $row['address'] ?>" placeholder="Enter User Address" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="select" class=" form-control-label">Computer Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="computer" class="form-control">
                                <option value="<?php echo $row['computer'] ?>" selected><?php echo $row['computer_name']; ?></option>
                            <?php
                                $DB->select('computer','*',null,"status=1",null,null);
                                $result = $DB->getResult();
                                foreach ($result as list("computer_id"=>$computer_id,"computer_name"=>$computer_name)) {
                                    echo "<option value='$computer_id'>$computer_name</option>";
                                }
                            ?>
                            </select>
                            <input type="text" hidden name="old_computer" value="<?php echo $row['computer']; ?>">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label type="text" class="form-control-label">In Time</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="datetime-local" name="in_time" value="<?php echo $row['In_time'] ?>" placeholder="Enter In Time" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label type="datetime-local" class="form-control-label">Out Time</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="datetime-local" name="out_time" value="<?php echo $row['out_time'] ?>" placeholder="Enter Out Time" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label">Id Proof</label>
                        </div>
                        <div class="col-12 col-md-5">
                        <?php
                            $DB->select('id_types','*',null,"status=1",null,null);
                            $id_types = $DB->getResult();
                            ?>
                            <select name="id_type" class="form-control" required>
                                <option value="" selected disabled>Select Id Type</option>
                                <?php foreach($id_types as $types){ ?>
                                    <option value="<?php echo $types['id']; ?>" <?php echo ($row['id_proof'] == $types['id']) ? 'selected' : ''; ?>><?php echo $types['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="text" name="id_value" value="<?php echo $row['id_proof_value']; ?>" placeholder="ID Proof Number" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label type="number" class="form-control-label">Fees</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" name="fees" value="" placeholder="Enter Computer Fees" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="select" class=" form-control-label">Remarks</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="remark" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="select" class=" form-control-label">Status</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="status" class="form-control">
                                <option value="1" <?php echo ($row['status'] == '1') ? 'selected' : ''; ?>>Check Out</option>
                                <option value="0" <?php echo ($row['status'] == '0') ? 'selected' : ''; ?>>Check In</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm" name="update">
                        <i class="fa fa-dot-circle-o"></i> Update
                    </button>
                </div>
            </form>
           
            <?php  } 
                $DB = new Database();
                if(isset($_POST['update'])){
                    
                }
            ?> 
        </div>
    </div>
</div>
<?php include("footer.php"); ?>  