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
                                <li class="breadcrumb-item active">Manage Users </li>
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


                <div class="container " style="margin-top: 20px !important;">
                    <div class="row">
                        <div class="col-md-5"> </div>
                        <div class="col-md-6">
                            <form action="search-user" method="POST">
                                <div class="row"  style="margin-top: -20pxd;">
                                    <div class="col-md-8">
                                    
                                            <div class="form-group ">
                                                <input type="text" name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; } ?>" placeholder="Search here.." class="form-control">
                                            </div>
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <input type="submit" name="user" class="btn btn-primary style3 " value="Submit">
                                    </div>
                                    
                                </div>
                            </form>
                            
                        </div>
                        <!-- <div class="col-md-3">
                            <button type="button" class="btn btn-primary style3 ">Search</button>
                        </div> -->
                    </div>

         
                </div>

                <div class="row">
                    <!-- ============================================================== -->
                    <!-- Table -->
                    <!-- ============================================================== -->
                    <div class="col-lg-12">
                        <div class="card">

                        <div class="card-header">
                            Manage Users
                        </div>
                            <div class="card-body">
                                <?php if(isset($_SESSION['report'])) echo $_SESSION['report']; ?>
                            <div class="table-responsive " style="min-height: 300px;">
                                <table class="table table-hover no-wrap">
                                    <thead>
                                        <tr>
                                            <th>Registration Date</th>
                                            <th>Username</th>
                                            <th>Fullname</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>VIP Status</th>
                                            <th>---</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 

                                    if(isset($_GET['search']) AND !empty($_GET['search'])){
                                        $search = $conn->real_escape_string($_GET['search']);

                                        $sqls = $conn->query("SELECT * FROM `dlogin` WHERE username LIKE '%$search%' OR dname LIKE '%$search%' OR demail LIKE '%$search%' OR dnumber LIKE '%$search%' OR date_registered LIKE '%$search%' ORDER BY username ");
                                        $total_records =$sqls->num_rows;
                                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                        $start_from = ($page_no - 1) * $total_records_per_page;

                                        $c = $conn->query("SELECT * FROM `dlogin` WHERE username LIKE '%$search%' OR dname LIKE '%$search%' OR demail LIKE '%$search%' OR dnumber LIKE '%$search%' OR date_registered LIKE '%$search%' ORDER BY username LIMIT $start_from, $total_records_per_page");
                                    }else{
                                        $sqls = $conn->query("SELECT * FROM `dlogin` ORDER BY username ");
                                        $total_records =$sqls->num_rows;
                                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                        $start_from = ($page_no - 1) * $total_records_per_page;

                                        $c = $conn->query("SELECT * FROM `dlogin` ORDER BY username LIMIT $start_from, $total_records_per_page");
                                    }
                                        if($c->num_rows>0){
                                            $num = 1;
                                            while($row=$c->fetch_assoc()):?>
                                            <tr>
                                                <td><?php echo $row['date_registered']; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo $row['dname']; ?></td>
                                                <td><?php echo $row['dnumber']; ?></td>
                                                <td><?php echo $row['demail']; ?></td>
                                                <td><?php echo $row['dvip']; ?></td>
                                                
                                                <!-- <td> &#8358;<?php //echo number_format($row['dwallet_balance']); ?></td> -->
                                                <td>

                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" data-toggle="modal" data-target="#max<?php echo $row['userid']; ?>" href="#">View</a>
                                                        <!-- <a class="dropdown-item" data-toggle="modal" data-target="#add<?php //echo $row['userid']; ?>" href="#">Add To Wallet</a> -->
                                                        <a class="dropdown-item" data-toggle="modal" data-target="#sub<?php echo $row['userid']; ?>" href="#">Subscribe User</a>
                                                        <!-- <a class="dropdown-item" data-toggle="modal" data-target="#minus<?php //echo $row['userid']; ?>" href="#">Minus From Wallet</a> -->
                                                        <a class="dropdown-item" href="transaction-history?userid=<?php echo $row['userid']; ?>" >Transaction History</a>
                                                        <!-- <div class="dropdown-divider"></div> -->

                                                        <?php if($row['status']=='ban'){?>
                                                        <a class="dropdown-item" id="unban" user="<?php echo $row['userid']; ?>" href="#"  >Unban User</a>
                                                        <?php }else{?>
                                                        <a class="dropdown-item" id="ban" user="<?php echo $row['userid']; ?>" href="#"> Ban User</a>
                                                        <?php  }?>
                                                    </div>
                                                </div>  

                                                
                                                </td>
                                            </tr>
                                            <?php endwhile;  }else{
                                                echo '
                                                <tr>
                                                <td colspan="8" class="text-danger">Sorry! No result found </td>
                                                </tr>
                                                ';
                                            }
                                            ?>
                                        
                                    </tbody>
                                </table>

                               

                            </div>
                            </div>
                            <div class="card-footer">
                            <ul class="pagination pagination-md justify-content-center">
            
                                <?php 
                                if(isset($_GET['search']) AND !empty($_GET['search'])){
                                    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                                        echo "<li  class='page-item '><a class='page-link' href='users?page_no=$counter&search=$search' style='color:#0088cc;'>$counter</a></li>"; 
                                    
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


        
<?php

$x = $conn->query("SELECT * FROM `dlogin` ORDER BY dname LIMIT $start_from, $total_records_per_page");
if($x->num_rows>0):
    while($xx = $x->fetch_assoc()): ?>


<!-- Wrapper End -->
<div class="modal fade" id="add<?php echo $xx['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:550px;">
        <div class="modal-content">
            <form action="add-to-wallet" method="post">
                <div class="modal-header">
                    <h3 class="modal-title" id="addressModalLabel">Add to Wallet</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div><!-- End .modal-header -->
                <div class="modal-body">
                <div class="form-group">                    
                    <input type="text" name="" disabled class="form-control " value="<?php echo $xx['username']; ?>">
                </div>
                        <div class="form-group">
                            <label for="cat">Amount</label>
                            <input type="hidden" name="userid" value="<?php echo $xx['userid']; ?>">
                            <input type="number" name="cat" id="cat" required pattern="[0-9]" placeholder="Enter amount to Add e.g 1000" class="form-control">
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



<div class="modal fade" id="sub<?php echo $xx['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:550px;">
        <div class="modal-content">
            <form action="user-subcribe-process" method="post">
                <div class="modal-header">
                    <h3 class="modal-title" id="addressModalLabel">Subscribe User Manually</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div><!-- End .modal-header -->
                <div class="modal-body">
                <div class="form-group">                    
                    <input type="text" name="" disabled class="form-control " value="<?php echo $xx['username']; ?>">
                </div>
                        <div class="form-group">
                            <label for="cat">Select Plan</label>
                            <input type="hidden" name="userid" value="<?php echo $xx['userid']; ?>">
                            
                            <select name="subscribe" id="" class="form-control">
                                <option value="">Choose Plan</option>
                                <?php
                                $year = $sqp = $conn->query("SELECT * FROM dsubscription ORDER BY dplan+0");
                                if($year->num_rows>0){
                                    while($teen = $year->fetch_assoc()): ?>
                                    <option value="<?php echo $teen['dplan']; ?>"><?php echo $teen['dplan']; ?>Days | &#8358;<?php echo $teen['dprice']; ?></option>
                                    <?php endwhile; }?>
                            </select>
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


<div class="modal fade" id="minus<?php echo $xx['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:550px;">
        <div class="modal-content">
            <form action="add-to-wallet" method="post">
                <div class="modal-header">
                    <h3 class="modal-title" id="addressModalLabel">Minus From Wallet</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div><!-- End .modal-header -->
                <div class="modal-body">
                <div class="form-group">                    
                    <input type="text" name="" disabled class="form-control " value="<?php echo $xx['username']; ?>">
                </div>
                        <div class="form-group">
                            <label for="cat">Amount</label>
                            <input type="hidden" name="userid" value="<?php echo $xx['userid']; ?>">
                            <input type="number" name="cat" id="cat" required pattern="[0-9]" placeholder="Enter amount to Minus e.g 1000" class="form-control">
                        </div>

                </div><!-- End .modal-body -->
                <div class="modal-footer">
                <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" name="minus" class="btn btn-primary btn-sm">Submit</button>
                </div><!-- End .modal-footer -->
            </form>
        </div><!-- End .modal-content -->
    </div><!-- End .modal-dialog -->
</div>





<div class="modal fade" id="max<?php echo $xx['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:550px;">
        <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="addressModalLabel">User Details</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div><!-- End .modal-header -->
                <div class="modal-body">
                       
                    <table class="table-hover table table-bordered">

                    <tr>
                        <td colspan="2">User ID: <?php echo $xx['userid']; ?> </td>
                        <td colspan="2">Username: <?php echo $xx['username']; ?> </td>
                        
                    </tr>
                    <tr>
                        <td colspan="2">Fullname: <?php echo $xx['dname']; ?> </td>
                        <td colspan="2">Phone: <?php echo $xx['dnumber']; ?> </td>

                    </tr>

                    <tr>
                        <td colspan="2">Email: <?php echo $xx['demail']; ?> </td>
                        <td>Wallet: &#8358;<?php echo number_format($xx['dwallet_balance']); ?></td>
                        
                    </tr>

                    <tr>
                        <td colspan="4">Address: <?php echo $xx['address']; ?> </td>
                        
                    </tr>
                    <tr>
                    <td>Membership: <?php if($xx['dcategory']=='Tipster' && $xx['dvip']=='inactive'  ){
                                                    echo "Member";
                                                    }else if($xx['dcategory']=='Tipster' && $xx['dvip']=='active' ){ 
                                                        echo "VIP Member";
                                                    }else if($xx['dcategory']=='Punter' && $xx['dvip']=='active' ){
                                                        echo "VIP";
                                                    }else{
                                                        echo "Basic";
                                                    } ?></td>
                        <td colspan="">VIP: <?php echo ucfirst($xx['dvip']); ?> </td>
                        <td >Status: <?php echo ucfirst($xx['status']); ?> </td>
                    </tr>
                    </table>
                </div><!-- End .modal-body -->
                <div class="modal-footer">
                <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                </div><!-- End .modal-footer -->
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


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/inverse/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Dec 2020 09:57:47 GMT -->
</html>