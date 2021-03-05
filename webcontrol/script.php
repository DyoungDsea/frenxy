 <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/node_modules/jquery/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="assets/node_modules/popper/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="assets/node_modules/raphael/raphael-min.js"></script>
    <script src="assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Popup message jquery -->
    <script src="assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <!-- Chart JS -->
    <script src="dist/js/dashboard1.js"></script>
    <!-- <script src="dist/js/pages/toastr.js"></script> -->
    <script src="app.js"></script>
    <script src="dist/sweetalert.js"></script>
    <script src="../ckeditor/ckeditor.js"></script>


<div id="clickme"></div>
    

  <?php
    if(isset($_SESSION['msg'])){ ?>
    <script> 
       fireForMe("<?php echo $_SESSION['msg']; ?>", "error"); 
    </script>
    <?php
unset($_SESSION['msg']);
  } ?>

<?php
    if(isset($_SESSION['msgs'])){ ?>
    <script>    
    fireForMe("<?php echo $_SESSION['msgs']; ?>", "info");      
    </script>
    <?php unset($_SESSION['msgs']); } ?>


  