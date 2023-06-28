<?php $title = 'Edit ID Type';
include 'header.php' ; ?>  
<?php include 'sidebar.php'; ?>  
<!-- MAIN CONTENT-->
<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
<div class="row mb-3">
    <div class="col-md-12">
        <div class="overview-wrap">
        <h2 class="title-1">Edit ID Type</h2>
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
                <strong>Edit Detail</strong>
            </div>
            <?php
                $DB = new Database();
                $id =$_GET['id'];
                $DB->select('id_types','*',null,"id='{$id}'",null,null);
                $result = $DB->getResult();
                foreach ($result as $row){
            ?>
            <form id="updateID_type" method="post" class="form-horizontal">
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="form-control-label">Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="id_name" value="<?php echo $row['name'] ?>" placeholder="Enter ID Name" class="form-control">
                            <input type="text" name="id" value="<?php echo $row['id'] ?>" hidden>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label type="text" class="form-control-label">Status</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="status" class="form-control">
                                <option value="1" <?php echo ($row['status'] == '1') ? 'selected' : ''; ?> >Show</option>
                                <option value="0" <?php echo ($row['status'] == '0') ? 'selected' : ''; ?> >Hide</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary btn-sm" name="update" value="Update">
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>  