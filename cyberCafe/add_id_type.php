<?php $title = 'Add ID Proof Type';
include 'header.php'; ?>  
<?php include 'sidebar.php'; ?>  
<!-- MAIN CONTENT-->
<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
<div class="row mb-3">
    <div class="col-md-12">
        <div class="overview-wrap">
        <h2 class="title-1">Add ID Type</h2>
            <a href="id_types.php" class="au-btn au-btn-icon au-btn--green au-btn--small text-white">
                <i class="fa fa-list"></i>
                All ID Types
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Add Details</strong>
            </div>
            <form id="addID_type" method="post" class="form-horizontal">
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="form-control-label">Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="id_name" placeholder="Enter Name" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label type="text" class="form-control-label">Status</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="status" class="form-control">
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
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