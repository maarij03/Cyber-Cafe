<?php $title = 'Add New User';
include 'header.php'; ?>  
<?php include 'sidebar.php'; ?>  
<?php $DB = new Database(); ?>
<!-- MAIN CONTENT-->
<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
<div class="row mb-3">
    <div class="col-md-12">
        <div class="overview-wrap">
        <h2 class="title-1">Add User</h2>
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
                <strong>Add User Detail</strong>
            </div>
            <form id="addUser" method="POST" class="form-horizontal">
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="form-control-label">User Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="user_name" placeholder="Enter User Name" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label type="email" class="form-control-label">Email</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="email" name="email" placeholder="Enter Email Address" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label type="number" class="form-control-label">Phone</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" name="phone" placeholder="Enter User Phone Number" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label type="text" class="form-control-label">Address</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="address" placeholder="Enter User Address" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="select" class=" form-control-label">Computer Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="computer" class="form-control" required>
                                <option value="" selected disabled>Select Computer</option>
                            <?php
                                $DB->select('computer','*',null,"status=1",null,null);
                                $result = $DB->getResult();
                                foreach ($result as list("computer_id"=>$computer_id,"computer_name"=>$computer_name)) {
                                    echo "<option value='$computer_id'>$computer_name</option>";
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label type="datetime-local" class="form-control-label">In Time</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="datetime-local" name="in_time" value="<?php echo date('Y-m-d H:i') ?>" placeholder="Enter In Time" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="select" class=" form-control-label">Id Proof</label>
                        </div>
                        <div class="col-12 col-md-5">
                            <?php
                            $DB->select('id_types','*',null,"status=1",null,null);
                            $id_types = $DB->getResult();
                            ?>
                            <select name="id_type" class="form-control" required>
                                <option value="" selected disabled>Select Id Type</option>
                                <?php foreach($id_types as $types){ ?>
                                    <option value="<?php echo $types['id']; ?>"><?php echo $types['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="text" class="form-control" name="id_value" placeholder="Enter ID Proof Number" required>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary btn-sm" name="submit" value="Submit">
                </div>
            </form>
            <?php
                
            ?>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>  