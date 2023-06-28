<?php $title="Computers";
include 'header.php'; ?>  
<?php include 'sidebar.php'; ?>  
<!-- MAIN CONTENT-->
<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
<div class="row mb-3">
    <div class="col-md-12">
        <div class="overview-wrap">
        <h2 class="title-1">Computers</h2>
            <a href="add_computer.php" class="au-btn au-btn-icon au-btn--green au-btn--small text-white">
                <i class="zmdi zmdi-plus"></i>
                Add Computer
            </a>
        </div>
    </div>
</div>
<?php
    $DB = new Database();
    $status = 'all';
    $where = '';
    if(isset($_GET['status']) && $_GET['status'] != ''){
        if($_GET['status'] != 'all' || $_GET['status'] == '0' || $_GET['status'] == '1'){
            $status = $_GET['status'];
            $where .= "computer.status={$status}";
        }
        
    }
    $DB->select('computer','*',null,$where,'computer_id DESC',null);
    $result = $DB->getResult();
?>
<div class="row">
    <div class="col-md-12">
        <div class="card table-responsive px-3 pb-3">
        <div class="card-header mb-3 px-0 d-flex ">
                <strong>Computers List</strong>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="ml-auto w-auto">
                    <select name="status" class="form-control" onChange="form.submit()">
                        <option value="1" <?php echo ($status == '1') ? 'selected' : '';  ?>>Free  Computers</option>
                        <option value="0" <?php echo ($status == '0') ? 'selected' : '';  ?> >Booked Computers</option>
                        <option value="all" <?php echo ($status == 'all') ? 'selected' : '';  ?>>All Computers</option>
                    </select>
                </form>
            </div>
        
            <table id="showData"  class='table table-bordered'>
                <thead class="thead-dark">
                    <tr>
                        <th>S.No.</th>
                        <th>Computer Name</th>
                        <th>Computer Location</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr >
                </thead>
                <tbody>
            <?php  $i=0;
                    foreach ($result as list("computer_id"=>$id,"computer_name"=>$computer_name,"computer_location"=>$computer_location,"status"=>$status)) { 
                        $i++; ?>
                        <tr class='tr-shadow'>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $computer_name; ?></td>
                            <td><?php echo $computer_location; ?></td>
                            <td><?php echo ($status == '1') ? 'Free' : 'Booked'; ?></td>
                            <td>
                                <div class='table-data-feature'>
                                    <button class='item' data-toggle='tooltip' data-placement='top' title='Edit'>
                                    <a href='edit_computer.php?computer_id=<?php echo $id; ?>'><i class='zmdi zmdi-edit'></i></a>
                                    </button>
                                    <button class='item delete-computer' data-toggle='tooltip' data-placement='top' title='Delete' data-id="<?php echo $id; ?>">
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
