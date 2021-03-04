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
                                <li class="breadcrumb-item active"> Manage Posts  </li>
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
                            <button type="button" class="btn btn-info style3 " style="float:right;" data-toggle="modal" data-target="#add">Add New Post</button>                            
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
                            Manage Post 
                        </div>
                            <div class="card-body">
                            <div class="table-responsive " style="min-height: 300px;">
                            <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Author</th>
                                                    <th>Title</th>
                                                    <th>Category</th>
                                                    <th>Description</th>
                                                    <th>---</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myDIV">
                                            <?php 
                                    
                                                $sqls=$conn->query("SELECT * FROM `dpost` ORDER BY id DESC");
                                                $total_records =$sqls->num_rows;
                                                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                $start_from = ($page_no - 1) * $total_records_per_page;
                                                $c = $conn->query("SELECT * FROM `dpost` ORDER BY id DESC LIMIT  $total_records_per_page");
                                    
                                                if($c->num_rows>0){
                                                    $num = 1;
                                                    while($row=$c->fetch_assoc()):?>
                                                    <tr>
                                                        <td><?php echo formatDateTime($row['ddate']) ?></td>
                                                        <td><?php echo $row['dname']; ?></td>
                                                        <td><?php echo $row['dtitle']; ?></td>
                                                        <td><?php echo $row['dcategory']; ?></td>
                                                        <td><?php echo $row['ddesc']; ?></td>
                                                        
                                                        <td>

                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" data-toggle="modal" data-target="#max<?php echo $row['id']; ?>" href="#">Edit Post</a>
                                                                <a class="dropdown-item" id="gameDelete" user="<?php echo $row['gid']; ?>" href="#">Delete Post</a>
                                                                

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
                                // if(isset($_GET['search']) AND !empty($_GET['search'])){
                                //     for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                                //         echo "<li  class='page-item '><a class='page-link' href='manage-categories?page_no=$counter&search=$search' style='color:#0088cc;'>$counter</a></li>"; 
                                    
                                //     }
                                // }else{
                                //     for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                                //         echo "<li  class='page-item '><a class='page-link' href='?page_no=$counter' style='color:#0088cc;'>$counter</a></li>"; 
                                    
                                //     }
                                // }
                            
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
                <form action="add-game-process" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">New Game</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="category" id="catego" class="form-control">
                                        <option value="">Choose Category</option>
                                        <?php
                                        $boos = $conn->query("SELECT * FROM dpost_categories");
                                        if($boos->num_rows>0){
                                            while($boox=$boos->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $boox['category_id']; ?>"><?php echo $boox['dcategory']; ?></option>
                                        <?php } } ?>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="gtip" id="" class="form-control">
                                        <option value="">Tip Category</option>
                                        <option value="Daily">Daily Tip </option>
                                        <option value="VIP">VIP Tip </option>                                        
                                        <option value="Sure">Sure Tip </option>                                        
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cats">Home</label>
                                    <input type="text" name="home" id="cats" required placeholder="Enter Home" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="catx">Away</label>
                                    <input type="text" name="away" id="catx" required placeholder="Enter Away" class="form-control">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <!-- <select name="tip" id="" class="form-control">
                                        <option value="">Choose Tip</option>
                                        <option value="Home">Home Win </option>
                                        <option value="Away">Away Win </option>                                        
                                        <option value="Draw">Draw </option>
                                    </select> -->
                                    <input type="text" name="tip" id="" required placeholder="Enter Tips here..." class="form-control">

                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="percent" id="" class="form-control">
                                        <option value="">Choose Probability</option>
                                        <?php for($i=1; $i<=100; $i++){?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?>%</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <!-- <div class="col-md-6">
                                <div class="form-group">                                    
                                    <input type="text" name="tour" id="" required placeholder="Enter Tournament here..." class="form-control">

                                </div>
                            </div> -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="tour" id="sub" class="form-control">
                                        <option value="">Choose Tournament</option>
                                    </select>
                                  
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">                                    
                                    <input type="text" name="date" id="" title="Use this format for Date : 2020-01-23 " required placeholder="Date eg 2020-01-23  " class="form-control">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">                                    
                                    <input type="text" name="time" id="" title="Use this format for Time: 13:55:00" required placeholder="Time eg 13:55:00 " class="form-control">
                                </div>
                            </div>

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

    $x = $conn->query("SELECT * FROM `dpost` WHERE dresult='pending' ORDER BY id DESC LIMIT $total_records_per_page");
    if($x->num_rows>0): $xp=$q=1;
        while($xx = $x->fetch_assoc()): ?>
    <div class="modal fade" id="max<?php echo $xx['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                <form action="add-game-process" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Update Game</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">
                           <input type="hidden" name="pi" value="<?php echo $xx['gid']; ?>">
                    <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="category" id="update" index="<?php echo $q++; ?>" class="form-control update">
                                        <option value="">Choose Category</option>
                                        <?php
                                        $boos = $conn->query("SELECT * FROM dpost_categories");
                                        if($boos->num_rows>0){
                                            while($boox=$boos->fetch_assoc()){
                                        ?>
                                        <option <?php if($xx['dcategory_id']==$boox['category_id']) echo 'selected'; ?> gid="<?php echo $xx['gid']; ?>"  value="<?php echo $boox['category_id']; ?>"><?php echo $boox['dcategory']; ?></option>
                                        <?php } } ?>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="gtip" id="" class="form-control">
                                        <option value="">Tip Category</option>
                                        <option <?php if($xx['tipcategory']=='Daily') echo 'selected'; ?> value="Daily">Daily Tip </option>
                                        <option <?php if($xx['tipcategory']=='VIP') echo 'selected'; ?> value="VIP">VIP Tip </option>                                        
                                        <option <?php if($xx['tipcategory']=='Sure') echo 'selected'; ?> value="Sure">Sure Tip </option>                                        
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cats">Home</label>
                                    <input type="text" name="home" id="cats" value="<?php echo $xx['dhome']; ?>" required placeholder="Enter Home" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="catx">Away</label>
                                    <input type="text" name="away" id="catx" value="<?php echo $xx['daway']; ?>" required placeholder="Enter Away" class="form-control">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">                                    
                                    <input type="text" name="tip" value="<?php echo $xx['dtip']; ?>" id="" required placeholder="Enter Tips here..." class="form-control">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="percent" id="" class="form-control">
                                        <option value="">Choose Probability</option>
                                        <?php for($i=1; $i<=100; $i++){?>
                                        <option <?php if($xx['dpercent']== $i) echo 'selected'; ?> value="<?php echo $i; ?>"><?php echo $i; ?>%</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="tour" id="subs<?php echo $xp++; ?>" class="form-control">
                                        <option value="">Choose Tournament</option>
                                    </select>
                                  
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="form-group">                                    
                                    <input type="text" name="date" id="" value="<?php echo date("Y-m-d",strtotime($xx['ddate'])); ?>" title="Use this format for Date : 2020-01-23 " required placeholder="Date eg 2020-01-23  " class="form-control">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">                                    
                                    <input type="text" name="time" id="" value="<?php echo date("H:i:s",strtotime($xx['ddate'])); ?>" title="Use this format for Time: 13:55:00" required placeholder="Time eg 13:55:00" class="form-control">
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