<?php $title="ID Proof Types";
include 'header.php'; ?>  
<?php include 'sidebar.php'; ?>  
<!-- MAIN CONTENT-->
<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
<div class="row mb-3">
    <div class="col-md-12">
        <div class="overview-wrap">
        <h2 class="title-1">ID Types</h2>
            <a href="add_id_type.php" class="au-btn au-btn-icon au-btn--green au-btn--small text-white">
                <i class="zmdi zmdi-plus"></i>
                Add ID Type
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card table-responsive p-3">
        <?php
            $DB = new Database();
            $DB->select('id_types','*',null,null,'id DESC',null);
            $result = $DB->getResult();
            ?>
            <table id="showData" class='table table-bordered'>
                <thead class="thead-dark">
                    <tr>
                        <th>S.No.</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
            <?php  $i=0;
                    foreach ($result as list("id"=>$id,"name"=>$name,"status"=>$status)) { 
                        $i++; ?>
                        <tr class='tr-shadow'>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo ($status == '1') ? 'Active' : 'Inactive'; ?></td>
                            <td>
                                <div class='table-data-feature'>
                                    <button class='item' data-toggle='tooltip' data-placement='top' title='Edit'>
                                    <a href='edit_id_type.php?id=<?php echo $id; ?>'><i class='zmdi zmdi-edit'></i></a>
                                    </button>
                                    <button class='item delete-idName' data-toggle='tooltip' data-placement='top' title='Delete' data-id="<?php echo $id; ?>">
                                       <i class='zmdi zmdi-delete'></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>  
