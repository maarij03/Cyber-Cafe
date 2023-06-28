<?php $title = 'Add Computer';
include 'header.php'; ?>  
<?php include 'sidebar.php'; ?>  
<!-- MAIN CONTENT-->
<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
<div class="row mb-3">
    <div class="col-md-12">
        <div class="overview-wrap">
        <h2 class="title-1">Add Computer</h2>
            <a href="computer.php" class="au-btn au-btn-icon au-btn--green au-btn--small text-white">
                <i class="fa fa-list"></i>
                All Computers
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Add Computer Details</strong>
            </div>
            <form id="addComputer" method="post" class="form-horizontal">
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="form-control-label">Computer Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="computer_name" placeholder="Enter Computer Name" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label type="text" class="form-control-label">Computer Location</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="computer_location" placeholder="Enter Computer Location" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary btn-sm" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>  