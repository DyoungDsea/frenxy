<?php
require 'clean.php';

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
                                <li class="breadcrumb-item active">Transaction History </li>
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
                <form action="transaction-date" method="POST">
                    <div class="row">
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="#">Search From</label>
                                <input type="text" name="start" required value="<?php
                                if(isset($_GET['end'])){ echo $_GET['end']; }else{ 
                                $now = date("d-m-Y");
                                echo date("d-m-Y", strtotime('-30 days', strtotime($now)));} ?>" id="datepicker" placeholder="" class="form-control">
                                <input type="hidden" name="user"  value="<?php echo $_GET['userid']; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                                <div class="row"  style="margin-top: -20pxd;">
                                    <div class="col-md-8">
                                    
                                    <div class="form-group">
                                <label for="#">Search To</label>
                                    <input type="text" name="end" required value="<?php if(isset($_GET['start'])){ echo $_GET['start']; }else{echo date("d-m-Y");} ?>" placeholder="" id="" class="form-control">
                                </div>
                                        
                                    </div>
                                    <div class="col-md-4">
                                    <button type="submit" name="date" class="btn btn-primary btn-sm" style="margin-top:33px">Search</button>
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
                        Transaction History
                        </div>
                            <div class="card-body">
                            <div class="table-responsive " style="min-height: 300px;">
                            <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Date</th>
                                                    <th>Username</th>
                                                    <th>Description</th>
                                                    <th>Credit</th>
                                                    <th>Debit</th>
                                                    <th>Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myDIV">
                                            <?php 

                                        if(isset($_GET['userid'])):
                                            $userid = clean($_GET['userid']);
                                            if(isset($_GET['start']) AND isset($_GET['end'])){
                                                $start_date = date("Y-m-d h:i:s",  strtotime('+1 days', strtotime(clean($_GET['start']))));
                                                $end_date = date("Y-m-d h:i:s", strtotime(clean($_GET['end'])));
                                            }else{
                                                $start_date = date("Y-m-d h:i:s", strtotime('+1 days', strtotime(date("Y-m-d h:i:s"))));
                                                $end_date = date("Y-m-d h:i:s", strtotime('-30 days', strtotime($start_date)));
                      
                                            }

                                            if(isset($_GET['start']) AND isset($_GET['end'])){
                                                $start_date = date("Y-m-d ",  strtotime('+1 days', strtotime(clean($_GET['start']))));
                                                $end_date = date("Y-m-d ", strtotime(clean($_GET['end'])));
                      
                                                $sqls =$conn->query("SELECT * FROM `dtransaction_history` WHERE userid='$userid' AND ddate <= '$start_date' AND ddate >= '$end_date'  ORDER BY id DESC");
                      
                                              $total_records =$sqls->num_rows;
                                              $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                              $start_from = ($page_no - 1) * $total_records_per_page;
                                              $c =$conn->query("SELECT * FROM `dtransaction_history` WHERE userid='$userid' AND CAST(ddate as date) BETWEEN '$start_date'AND '$end_date'  ORDER BY id DESC LIMIT $start_from, $total_records_per_page");
                      
                                            }else{
                                               $start_date = date("Y-m-d h:i:s", strtotime('+1 days', strtotime(date("Y-m-d h:i:s"))));
                                               $end_date = date("Y-m-d h:i:s", strtotime('-30 days', strtotime($start_date)));
                      
                                               $sqls =$conn->query("SELECT * FROM `dtransaction_history` WHERE userid='$userid' AND ddate <= '$start_date' AND ddate >= '$end_date'  ORDER BY id DESC");
                      
                                              $total_records =$sqls->num_rows;
                                              $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                              $start_from = ($page_no - 1) * $total_records_per_page;
                                              $c =$conn->query("SELECT * FROM `dtransaction_history` WHERE userid='$userid' AND ddate <= '$start_date' AND ddate >= '$end_date'  ORDER BY id DESC LIMIT $start_from, $total_records_per_page");
                                            }
                                            
                                               
                                           
                                                if($c->num_rows>0){
                                                    $num = 1;
                                                    while($r=$c->fetch_assoc()):
                                                        $user = $r['userid'];
                                                        $bal = $conn->query("SELECT * FROM dlogin WHERE userid='$user'")->fetch_assoc();
                                                    
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $r['transaction_id']; ?></td>
                                                        <td><?php 
                                                        $date = $r['ddate'];
                                                        echo $ddate = date("d/m/Y h:i:s", strtotime('+5 hours', strtotime($date)));
                                                         ?></td>
                                                        <td><?php echo $bal['username']; ?></td>
                                                        <td><?php echo $r['dname']; ?></td>
                                                        <td style="color:green;"><b><?php if($r['dcredit'] != NULL){echo '&#8358;'.number_format($r['dcredit']);} ?></b></td>
                                                        <td style="color:red;"><b><?php if($r['ddebit'] != NULL){echo '- &#8358;'.number_format($r['ddebit']);} ?></b></td>

                                                        <td> &#8358;<?php echo number_format($r['dwallet_balance']); ?></td>
                                                        
                                                    </tr>
                                                    <?php endwhile;  }else{
                                                        echo '
                                                        <tr>
                                                        <td colspan="8" class="text-danger">Sorry! No result found </td>
                                                        </tr>
                                                        ';
                                                    }
                                                endif;  ?>
                                                    
                                            </tbody>

                                        </table>
                                       
                                            <a href="javascript:history.back()" style="margin: 20px 0" class="btn btn-info pull-right"> <<- Back</a>

                               

                            </div>
                            </div>
                            <div class="card-footer">
                            <ul class="pagination pagination-md justify-content-center">
            
                                            <?php 

                                        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                                                echo "<li  class='page-item '><a class='page-link' href='transaction-history?userid=$userid&page_no=$counter' style='color:#0088cc;'>$counter</a></li>"; 
                                            
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

    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <?php include 'script.php'; ?>
</body>


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/inverse/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Dec 2020 09:57:47 GMT -->
</html>