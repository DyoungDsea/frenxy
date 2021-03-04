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
                                <li class="breadcrumb-item active">Update Banner  </li>
                            </ol>
                        </div>
                    </div>
                </div>
               


                <div class="container " style="margin: 20px 0 !important;">
                    <div class="row">
                        <div class="col-md-4">
                                    
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-3">
                            <!-- <button type="button" class="btn btn-info style3 " style="float:right;" data-toggle="modal" data-target="#max">Add Banner</button> -->
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
                            Update Banner
                        </div>
                            <div class="card-body">
                            <div class="table-responsive " style="min-height: 300px;">
                            <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Position</th>
                                                    <th>URL</th>
                                                    <th>Date</th>
                                                    <th>---</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myDIV">
                                            <?php 
                                                
                                                $sql = runQuery("SELECT * FROM `dbanner` ORDER BY id DESC");
                                    
                                                if($sql->num_rows>0){
                                                    $num = 1;
                                                    while($row=fetchAssoc($sql)):?>
                                                    <tr>
                                                        <td><img style="max-width: 150px;" src="../banner/<?php echo $row['dimg']; ?>" alt=""></td>
                                                        <td><?php echo $row['dpost']; ?></td>
                                                        <td><?php echo $row['durl']; ?></td>
                                                        <td><?php echo formatDate($row['ddate']); ?></td>
                                                        
                                                        <td>

                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#max<?php echo $row['id']; ?>" href="#">Update Banner</a>

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


        <div class="modal fade" id="max" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:550px;">
        <div class="modal-content">
            <form action="update-banner-process" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h3 class="modal-title" id="addressModalLabel">Add Banner</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div><!-- End .modal-header -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="cats">Position</label>
                        <input type="text" name="post" id="cats" required placeholder="Enter Position" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="cats">Banner URL</label>
                        <input type="text" name="url" id="cats" required placeholder="Enter Banner URL" class="form-control">
                    </div>
                
                    <div class="form-group">
                        <input type="file" name="img" required class="form-control-file">
                    </div>                       

                </div><!-- End .modal-body -->
                <div class="modal-footer">
                <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" name="add" class="btn btn-primary btn-sm">Update</button>
                </div><!-- End .modal-footer -->
            </form>
        </div><!-- End .modal-content -->
    </div><!-- End .modal-dialog -->
</div>   

        
<?php

$x = runQuery("SELECT * FROM `dbanner` ORDER BY id DESC");

if($x->num_rows>0): $xp=$q=1;
    while($xx = $x->fetch_assoc()): ?>
<div class="modal fade" id="max<?php echo $xx['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:550px;">
        <div class="modal-content">
            <form action="update-banner-process" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h3 class="modal-title" id="addressModalLabel">Update Banner</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div><!-- End .modal-header -->
                <div class="modal-body">
                    
                    <input type="hidden" name="bi" value="<?php echo $xx['bid']; ?>">
                    <input type="hidden" name="himg" value="<?php echo $xx['dimg']; ?>">
                    <div class="form-group">
                        <label for="cats">Banner URL</label>
                        <input type="text" name="url" id="cats" value="<?php echo $xx['durl']; ?>" required placeholder="Enter Banner URL" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="file" name="img" required class="form-control-file">
                    </div>

                </div><!-- End .modal-body -->
                <div class="modal-footer">
                <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" name="update" class="btn btn-primary btn-sm">Update</button>
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