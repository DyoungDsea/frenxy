<?php

 require 'clean.php';

 if($_SERVER["REQUEST_METHOD"]=="POST"):
   $category_id = clean($_POST['category']);
   $tour = clean($_POST['tour']);    
   $cat = findCategoryName($category_id);

 if(isset($_POST['log'])){
     $id =  date("ymdhis").rand(10000, 999999); 
     //insert into dbase
     $q = $conn->query("INSERT INTO `dsub_cat` SET sid='$id', dcategory_id='$category_id', dcategory='$cat', dsub_cat='$tour'");
     if($q){
        $_SESSION['msgs']='Added succesfully';
     }else{
        $_SESSION['msg']='Fail! try again later';
     }
     
     header("Location: manage-sub-categories");

 }else if(isset($_POST['logx'])){
    $id = clean($_POST['hid']);

    $q = $conn->query("UPDATE `dsub_cat` SET dcategory_id='$category_id', dcategory='$cat', dsub_cat='$tour' WHERE sid='$id' ");
    if($q){         
       $_SESSION['msgs']='Updated succesfully';
    }else{
       $_SESSION['msg']='Fail! try again later';
    }    
    header("Location: manage-sub-categories");

}else{
     $_SESSION['msg']='Oops! try again later';
     header("Location: index");
 }




endif;

function findCategoryName($data){
    $sql = runQuery("SELECT * FROM dcategory WHERE cid='$data'")->fetch_assoc();
    return $sql['dcategory'];

}