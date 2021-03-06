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
                                <li class="breadcrumb-item active">Add Games  </li>
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
                        $total_records_per_page = 10;

                        ?>


                <div class="container " style="margin: 20px 0 !important;">
                    <div class="row">
                        <div class="col-md-4">
                                    
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-3">
                            <!-- <button type="button" class="btn btn-info style3 " style="float:right;" data-toggle="modal" data-target="#add">Add Game</button> -->
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
                            Manage Games
                        </div>
                            <div class="card-body">
                            <div class="table-responsive " style="min-height: 300px;">
                            <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Tip Category</th>
                                                    <th>Category</th>
                                                    <th>Home</th>
                                                    <th>Away</th>
                                                    <th>Tip</th>
                                                    <th>(%)</th>
                                                    <th>Result</th>
                                                    <th>Scores</th>
                                                    <th>---</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myDIV">
                                            <?php 
                                                $get_id = clean($_GET['category']);
                                                $sqls=$conn->query("SELECT * FROM `dgame` WHERE dresult='pending' AND dcategory_id='$get_id' AND tipcategory='VIP' ORDER BY id");
                                                $total_records =$sqls->num_rows;
                                                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                $start_from = ($page_no - 1) * $total_records_per_page;
                                                $c = $conn->query("SELECT * FROM `dgame` WHERE dresult='pending' AND dcategory_id='$get_id' AND tipcategory='VIP' ORDER BY id DESC LIMIT $start_from, $total_records_per_page");
                                    
                                                if($c->num_rows>0){
                                                    $num = 1;
                                                    while($row=$c->fetch_assoc()):?>
                                                    <tr>
                                                        <td><?php echo formatDate($row['ddate']) ?></td>
                                                        <td><?php echo $row['tipcategory']; ?></td>
                                                        <td><?php echo $row['gcategory']; ?></td>
                                                        <td><?php echo $row['dhome']; ?></td>
                                                        <td><?php echo $row['daway']; ?></td>
                                                        <td><?php echo $row['dtip']; ?></td>
                                                        <td><?php echo $row['dpercent']; ?></td>
                                                        <td><?php echo $row['dresult']; ?></td>
                                                        <td>
                                                        <?php if($row['dscore1']==0 && $row['dscore2']==0 && $row['dresult']=="pending") echo "? - ?"; else echo $row['dscore1']." - ". $row['dscore2']; ?>
                                                        </td>
                                                        <td>

                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#max<?php echo $row['id']; ?>" href="#">Update Score</a>

                                                                <a class="dropdown-item" id="gameWon" user="<?php echo $row['gid']; ?>" href="#">Mark as Won</a>
                                                                <a class="dropdown-item" id="gameLost" user="<?php echo $row['gid']; ?>" href="#">Mark as Lost</a>
                                                                

                                                            </div>
                                                        </div>  



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

                               
                                        <a href="javascript:history.back()" style="margin: 40px 0" class="btn btn-info pull-rights"> << Back</a>

                            </div>
                            </div>
                            <div class="card-footer">
                            <ul class="pagination pagination-md justify-content-center">
            
                                <?php 
                                if(isset($_GET['search']) AND !empty($_GET['search'])){
                                    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                                        echo "<li  class='page-item '><a class='page-link' href='games?category=$get_id&page_no=$counter&search=$search' style='color:#0088cc;'>$counter</a></li>"; 
                                    
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

      
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <?php include 'footer.php'; ?>





        
<?php

$x = $conn->query("SELECT * FROM `dgame` WHERE dresult='pending' ORDER BY id DESC LIMIT $start_from, $total_records_per_page");
if($x->num_rows>0): $xp=$q=1;
    while($xx = $x->fetch_assoc()): ?>
<div class="modal fade" id="max<?php echo $xx['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:550px;">
        <div class="modal-content">
            <form action="scores-process" method="post">
                <div class="modal-header">
                    <h3 class="modal-title" id="addressModalLabel">Update Score</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div><!-- End .modal-header -->
                <div class="modal-body">
                       <input type="hidden" name="pi" value="<?php echo $xx['gid']; ?>">
                       <input type="hidden" name="category" value="<?php echo $_GET['category']; ?>">
                <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cats">Home</label>
                                <input type="text" name="home" id="cats" value="<?php echo $xx['dscore1']; ?>" required placeholder="Enter Home" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="catx">Away</label>
                                <input type="text" name="away" id="catx" value="<?php echo $xx['dscore1']; ?>" required placeholder="Enter Away" class="form-control">
                            </div>
                        </div>

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
  





    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <?php include 'script.php'; ?>
</body>


</html>