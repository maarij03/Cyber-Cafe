<?php include('header.php');?>   
<?php include('sidebar.php'); ?>  
<!-- MAIN CONTENT-->
<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
<div class="row">
<?php
    $DB = new Database();
    
    ?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Change Password</strong>
            </div>
            <form id="changePass" method="POST" class="form-horizontal">
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="form-control-label">Old Password</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="password" name="old_pass" placeholder="Old Password" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="form-control-label">New Password</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="password" name="new_pass" id="password" placeholder="New Password" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="form-control-label">Confirm Password</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="password" name="con_pass" placeholder="Confirm Password" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary btn-sm" name="change" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>  