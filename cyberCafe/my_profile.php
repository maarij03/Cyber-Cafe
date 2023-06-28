<?php include('header.php'); ?>  
<?php include('sidebar.php'); ?>  
<!-- MAIN CONTENT-->
<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Edit Profile</strong>
            </div>
            <?php
                $DB = new Database();
                $colName = "admin.id,admin.admin_name,admin.username,admin.email";
                $DB->select('admin','*',null,null,null,null);
                $result = $DB->getResult();
                foreach ($result as $row){
            ?>
            <form id="editProfile" method="POST" class="form-horizontal">
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="form-control-label">Admin Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>" placeholder="Enter Admin Id" class="form-control">
                            <input type="text" name="admin_name" value="<?php echo $row['admin_name'] ?>" placeholder="Enter Admin Name" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label type="text" class="form-control-label">Admin Username</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="admin_user" value="<?php echo $row['username'] ?>" placeholder="Enter Admin Username" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label type="email" class="form-control-label">Email</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="email" name="email" value="<?php echo $row['admin_email'] ?>" placeholder="Enter Email Admin" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="form-control-label">Company Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="com_name" value="<?php echo $row['com_name'] ?>" placeholder="Company Name" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" name="update" class="btn btn-primary btn-sm" value="Update">
                </div>
            </form>
            <?php }  ?>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>  