<?php $title = 'Edit Computer';
include 'header.php' ; ?>  
<?php include 'sidebar.php'; ?>  
<!-- MAIN CONTENT-->
<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
<div class="row mb-3">
    <div class="col-md-12">
        <div class="overview-wrap">
        <h2 class="title-1">Edit Computer</h2>
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
                <strong>Edit Computer Detail</strong>
            </div>
            <?php
                $DB = new Database();
                $computer_id =$_GET['computer_id'];
                $DB->select('computer','*',null,"computer_id='{$computer_id}'",null,null);
                $result = $DB->getResult();
                foreach ($result as $row){
            ?>
            <form id="updateComputer" method="post" class="form-horizontal">
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="form-control-label">Computer Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="hidden" name="computer_id" value="<?php echo $row['computer_id'] ?>">
                            <input type="text" name="computer_name" value="<?php echo $row['computer_name'] ?>" placeholder="Enter Computer Name" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label type="text" class="form-control-label">Computer Location</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="computer_location" value="<?php echo $row['computer_location'] ?>" placeholder="Enter Computer Location" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class="form-control-label">Status</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="status" class="form-control">
                                <option value="1" <?php echo ($row['status'] == '1') ? 'selected' : ''; ?> >Free</option>
                                <option value="0" <?php echo ($row['status'] == '0') ? 'selected' : ''; ?> >Booked</option>
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