<?php $title = 'Search Report';
include 'header.php'; ?>  
<?php include 'sidebar.php'; ?>  
<!-- MAIN CONTENT-->
<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Search</h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35"></h3>
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <form id="search-form" class="form-horizontal row" type="POST">
                    <div class="col-12 col-md-6 form-group">
                        <label for="">From Date</label>
                        <input type="date" name="from_date" class="form-control" value="<?php echo date('Y-m-d') ?>">
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <label for="">To Date</label>
                        <input type="date" name="to_date" class="form-control" value="<?php echo date('Y-m-d') ?>">
                    </div>
                    <div class="col-12 col-md-4 form-group">
                        <label for="">Type</label>
                        <select name="search_type" class="form-control">
                            <!-- <option value="" selected disabled>Select Search Type</option> -->
                        <option value="all" <?php echo (isset($_GET['search_type']) && $_GET['search_type'] == 'all') ? 'selected' : '' ; ?>>All Records</option>
                            <option value="id_proof" <?php echo (isset($_GET['search_type']) && $_GET['search_type'] == 'id_proof') ? 'selected' : '' ; ?>>ID Proof Wise</option>
                            <option value="user_name" <?php echo (isset($_GET['search_type']) && $_GET['search_type'] == 'user_name') ? 'selected' : '' ; ?>>Search User Name</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4 form-group id_type">
                        <label for="">Select ID Type</label>
                        <?php
                        $DB = new Database();
                        $DB->select('id_types','*',null,"status=1",null,null);
                        $id_types = $DB->getResult();
                        ?>
                        <select name="id_type" class="form-control">
                            <option value="" selected disabled>Select ID Type</option>
                            <?php foreach($id_types as $types){ ?>
                            <option value="<?php echo $types['id']; ?>"><?php echo $types['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-12 col-md-4 form-group id_value">
                        <label for="">ID Number</label>
                        <input type="text" class="form-control" name="id_value">
                    </div>
                    <div class="col-12 col-md-4 form-group user_name">
                        <label for="">User Name</label>
                        <input type="text" class="form-control" name="user_name" placeholder="Enter User Name">
                    </div>
                    <div class="col-12 col-md-12 form-group">
                        <input type="submit" class="btn btn-primary btn-sm" name="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table id="reportData" class='table table-bordered'>
                    <thead class="thead-dark">
                        <tr>
                            <th>Entry ID</th>
                            <th>User Details</th>
                            <th>Computer</th>
                            <th>Timings</th>
                            <th>Fees</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="text-align:right">Total Sum:</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>  
