<?php
require 'clean.php';

if(!isset($_SESSION['admin']) && $_SESSION['admin'] != true){
    header("Location: index");
}

?>
<!DOCTYPE html>
<html lang="en">


<?php include 'style.php'; ?>

<body class="skin-default fixed-layout">
    
    
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php include 'header.php'; ?>

        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include 'aside-left.php'; ?>

        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Dashboard </h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Manage Sub Category </li>
                            </ol>
                        </div>
                    </div>
                </div>
               
                <?php
                    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                        $page_no = $_GET['page_no'];
                    } else {
                        $page_no = 1;
                        } 
                        $total_records_per_page = 200;

                        ?>


                <div class="container " style="margin: 20px 0 !important;">
                    <div class="row">
                        <div class="col-md-4">
                                    
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-primary style3 " style="float:right;" data-toggle="modal" data-target="#add">Add Sub Category</button>
                        </div>
                    </div>

         
                </div>

                <div class="row">
                    <!-- ============================================================== -->
                    <!-- Table -->
                    <!-- ============================================================== -->
                    <div class="col-lg-12">
                        <div class="card">

                        <div class="card-header">
                            Manage Sub Category
                        </div>
                            <div class="card-body">
                            <div class="table-responsive " style="min-height: 300px;">
                            <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Categories</th>
                                                    <th>Sub Category</th>
                                                    <th>Date</th>
                                                    <th>---</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myDIV">
                                            <?php 
                                    
                                                $sqls=$conn->query("SELECT * FROM `dsub_cat`  ORDER BY dcategory");
                                                $total_records =$sqls->num_rows;
                                                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                $start_from = ($page_no - 1) * $total_records_per_page;
                                                $c = $conn->query("SELECT * FROM `dsub_cat` ORDER BY dcategory ASC LIMIT $start_from, $total_records_per_page");
                                    
                                                if($c->num_rows>0){
                                                    $num = 1;
                                                    while($row=$c->fetch_assoc()):?>
                                                    <tr>
                                                        <td><?php echo $num++; ?></td>
                                                        <td><?php echo $row['dcategory']; ?></td>
                                                        <td><?php echo $row['dsub_cat']; ?></td>
                                                        <td><?php echo formatDate($row['ddate']); ?></td>
                                                        <td>
                                                            <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#max<?php echo $row['id']; ?>" href="#"> <i class="icon-note"></i> Edit</a> 
                                                            <a class="btn btn-sm btn-danger" id="subDelete" data-id="<?php echo $row['sid']; ?>" href="#"> <i class="icon-trash"></i> Delete</a> 
                                                        </td>
                                                    </tr>
                                                    <?php endwhile;  }else{
                                                        echo '
                                                        <tr>
                                                        <td colspan="4" class="text-danger">Sorry! No result found </td>
                                                        </tr>
                                                        ';
                                                    }
                                                    ?>
                                                    
                                            </tbody>

                                        </table>

                               
                                        <a href="javascript:history.back()" style="margin: 40px 0" class="btn btn-info pull-rights"> <<- Back</a>

                            </div>
                            </div>
                            <div class="card-footer">
                            <ul class="pagination pagination-md justify-content-center">
            
                                <?php 
                                if(isset($_GET['search']) AND !empty($_GET['search'])){
                                    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                                        echo "<li  class='page-item '><a class='page-link' href='manage-categories?page_no=$counter&search=$search' style='color:#0088cc;'>$counter</a></li>"; 
                                    
                                    }
                                }else{
                                    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                                        echo "<li  class='page-item '><a class='page-link' href='?page_no=$counter' style='color:#0088cc;'>$counter</a></li>"; 
                                    
                                    }
                                }
                            
                                ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Comment - chats -->
                <!-- ============================================================== -->
                
                
                
                <!-- .right-sidebar -->
                <?php include 'aside-right.php'; ?>
                
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>


        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                <form action="manage-sub-categories-process" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Create SUb Categories</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">
                        
                                <div class="form-group">
                                <label for="catx">Category</label>
                                    <select name="category" required id="catx" class="form-control">
                                        <option value="">Choose Category</option>
                                        <?php
                                        $boos = $conn->query("SELECT * FROM dcategory ORDER BY dcategory ASC");
                                        if($boos->num_rows>0){
                                            while($boox=$boos->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $boox['cid']; ?>"><?php echo $boox['dcategory']; ?></option>
                                        <?php } } ?>
                                        
                                    </select>
                                </div>
                            
                            <div class="form-group">
                                <label for="cat">Sub Category</label>
                                <input type="text" name="tour" id="cat" required placeholder="Enter Sub Category" class="form-control">
                            </div>
                            

                           
                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Submit</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div>

<?php

    $x = $conn->query("SELECT * FROM `dsub_cat` ORDER BY dcategory");
    if($x->num_rows>0):
        while($xx = $x->fetch_assoc()): ?>
    <div class="modal fade" id="max<?php echo $xx['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                <form action="manage-sub-categories-process" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Update Sub Categories</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">
                    <input type="hidden" name="hid"  value="<?php echo $xx['sid']; ?>">
                            
                            <div class="form-group">
                                <label for="catx">Category</label>
                                    <select name="category" required id="catx" class="form-control">
                                        <option value="">Choose Category</option>
                                        <?php
                                        $boos = $conn->query("SELECT * FROM dcategory ORDER BY dcategory ASC");
                                        if($boos->num_rows>0){
                                            while($boox=$boos->fetch_assoc()){
                                        ?>
                                        <option <?php if($boox['cid']==$xx['dcategory_id']) echo "selected" ?> value="<?php echo $boox['cid']; ?>"><?php echo $boox['dcategory']; ?></option>
                                        <?php } } ?>
                                        
                                    </select>
                                </div>
                            
                            <div class="form-group">
                                <label for="cat">Sub Categories</label>
                                <input type="text" name="tour" value="<?php echo $xx['dsub_cat']; ?>" id="cat" required placeholder="Enter Sub Categories" class="form-control">
                            </div>
                           

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" name="logx" class="btn btn-primary btn-sm">Update</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div>
        <?php endwhile; endif; ?>
      
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <?php include 'footer.php'; ?>

    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <?php include 'script.php'; ?>
</body>


</html>