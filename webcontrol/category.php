<?php

 require 'clean.php';

 if($_SERVER["REQUEST_METHOD"]=="POST"):
   $cat = clean($_POST['cat']);

 if(isset($_POST['log'])){
     $id =  date("ymdhis").rand(10000, 999999);
     //insert into dbase
     $q = $conn->query("INSERT INTO `dcategory` SET cid='$id', dcategory='$cat'");
     if($q){
        $_SESSION['msgs']='Added succesfully';
     }else{
        $_SESSION['msg']='Fail! try again later';
     }
     header("Location: manage-categories");

 }else if(isset($_POST['logx'])){
    $id = clean($_POST['hid']);
    
    $q = $conn->query("UPDATE `dcategory` SET  dcategory='$cat' WHERE cid='$id' ");
    if($q){         
       $_SESSION['msgs']='Updated succesfully';

    }else{
       $_SESSION['msg']='Fail! try again later';
    }
    
    header("Location: manage-categories");

}else{
     $_SESSION['msg']='Oops! try again later';
     header("Location: index");
 }

endif;