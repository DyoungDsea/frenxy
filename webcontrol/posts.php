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
                        $total_records_per_page = 20;

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
                                                    <th>Image</th>
                                                    <th>Date</th>
                                                    <th>Post By</th>
                                                    <th>Type</th>
                                                    <th>Author</th>
                                                    <th>Title</th>
                                                    <th>Category</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>---</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myDIV">
                                            <?php 
                                    
                                                $sqls=$conn->query("SELECT * FROM `dpost` ORDER BY dstatus DESC");
                                                $total_records =$sqls->num_rows;
                                                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                $start_from = ($page_no - 1) * $total_records_per_page;
                                                $c = $conn->query("SELECT * FROM `dpost` ORDER BY dstatus DESC LIMIT $start_from, $total_records_per_page");
                                    
                                                if($c->num_rows>0){
                                                    $num = 1;
                                                    while($row=$c->fetch_assoc()):?>
                                                    <tr>
                                                    
                                                        <td> <img style="max-width: 40px;" src="../cover/<?php echo $row['dimg']; ?>" alt=""> </td>
                                                        <td><?php echo formatDate($row['ddate']) ?></td>
                                                        <td><?php echo $row['post_by']; ?></td>
                                                        <td><?php echo $row['dtype']; ?></td>
                                                        <td><?php echo $row['dname']; ?></td>
                                                        <td><?php echo limitText($row['dtitle'],5); ?></td>
                                                        <td><?php echo $row['dcategory']; ?></td>
                                                        <td><?php echo limitText($row['ddesc'],10); ?></td>
                                                        <td><?php echo $row['dstatus']; ?></td>
                                                        
                                                        <td>

                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" data-toggle="modal" data-target="#max<?php echo $row['id']; ?>" href="#">Edit Post</a>
                                                                <?php if($row['dstatus']=='inactive'){?>
                                                                <a class="dropdown-item" id="confirmPost" user="<?php echo $row['pid']; ?>" href="#">Enable Post</a>
                                                                <?php }else{?> 
                                                                    <a class="dropdown-item" id="disConfirmPost" user="<?php echo $row['pid']; ?>" href="#">Disable Post</a>
                                                                <?php }  ?>

                                                                <a class="dropdown-item" id="postDelete" user="<?php echo $row['pid']; ?>" href="#">Delete Post</a>
                                                                

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
        <div class="modal-dialog " role="document" style="max-width:550px;">
            <div class="modal-content">
                <form action="post-process" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">New Post</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">
                        <div class="row">
                        <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="author" id="cats" required placeholder="Enter Author" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="title" id="catx" required placeholder="Enter Title" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <select name="category" id="catego" class="form-control">
                                        <option value="">Choose Category</option>
                                        <?php
                                        $boos = $conn->query("SELECT * FROM dcategory");
                                        if($boos->num_rows>0){
                                            while($boox=$boos->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $boox['cid']; ?>"><?php echo $boox['dcategory']; ?></option>
                                        <?php } } ?>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12" id="sub" > </div>

                            <div class="col-md-12">
                                <div class="form-group">                                    
                                <select name="type" id="" class="form-control" required>
                                    <option value="">Choose Post Type</option>
                                    <option value="feature">Feature Post</option>
                                    <option value="latest">Latest Post</option>
                                </select>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">                                    
                                    <textarea name="desc" id="" cols="30" rows="10" class="ckeditor form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">                                    
                                    <input type="text" name="video" value="" placeholder="Video Url(Optional)" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">                                    
                                    <input type="text" name="by" required value="Admin" placeholder="Post By" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">                                    
                                    <input type="text" name="date" id="" title="Use this format for Date : 2020-01-23 " required placeholder="Published Date eg 2020-01-23  " class="form-control">
                                </div>
                            </div>
                          
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for=""> Cover Photo </label>                                    
                                    <input type="file" name="img" required class="form-control-file">
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

    $x = $conn->query("SELECT * FROM `dpost`  ORDER BY id DESC LIMIT $total_records_per_page");
    if($x->num_rows>0): $xp=$q=1;
        while($xx = $x->fetch_assoc()): ?>
    <div class="modal fade" id="max<?php echo $xx['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                <form action="post-process" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Update Game</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">
                           <input type="hidden" name="pi" value="<?php echo $xx['pid']; ?>">
                           <div class="row">

                        <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="author"  value="<?php echo $xx['dname']; ?>" id="cats" required placeholder="Enter Author" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="title" value="<?php echo $xx['dtitle']; ?>" id="catx" required placeholder="Enter Title" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <select name="category" id="update" index="<?php echo $q++; ?>"  class="form-control update">
                                        <option value="">Choose Category</option>
                                        <?php
                                        $boos = $conn->query("SELECT * FROM dcategory");
                                        if($boos->num_rows>0){
                                            while($boox=$boos->fetch_assoc()){
                                        ?>
                                        <option <?php if($xx['dcategory']==$boox['dcategory']) echo "selected"; ?> value="<?php echo $boox['cid']; ?>" pid="<?php echo $xx['pid']; ?>"><?php echo $boox['dcategory']; ?></option>
                                        <?php } } ?>
                                        
                                    </select>
                                </div>
                            </div>
                            
                            <?php //if(!is_null($xx['dsub_cat'])){ ?>
                            <div class="col-md-12" id="sub<?php echo $xp++ ?>" > <input type="hidden" name="sub" value=""> </div>
                            <?php //} ?>

                            <div class="col-md-12">
                                <div class="form-group">                                    
                                <select name="type" id="" class="form-control" required>
                                    <option  value="">Choose Post Type</option>
                                    <option <?php if($xx['dtype']=="feature") echo "selected"; ?> value="feature">Feature Post</option>
                                    <option <?php if($xx['dtype']=="latest") echo "selected"; ?> value="latest">Latest Post</option>
                                </select>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">                                    
                                    <textarea name="desc" id="" cols="30" rows="10" class="ckeditor form-control">
                                        <?php echo $xx['ddesc']; ?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">                                    
                                    <input type="text" name="video" value="<?php echo $xx['vurl']; ?>" placeholder="Video Url(Optional)" class="form-control">
                                </div>
                            </div>
                            
                           
                            <div class="col-md-6">
                                <div class="form-group">                                    
                                    <input type="text" name="by" value="<?php echo $xx['post_by']; ?>" required value="Admin" placeholder="Post By" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">                                    
                                    <input type="text" name="date" value="<?php echo $xx['ddate']; ?>" id="" title="Use this format for Date : 2020-01-23 " required placeholder="Published Date eg 2020-01-23  " class="form-control">
                                </div>
                            </div>

                           
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for=""> Cover Photo(Optional) </label>                                    
                                    <input type="file" name="img"  class="form-control-file">
                                    <input type="hidden" name="himg" value="<?php echo $xx['dimg']; ?>">
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