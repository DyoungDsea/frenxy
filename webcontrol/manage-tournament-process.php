<?php

 require 'clean.php';

 if($_SERVER["REQUEST_METHOD"]=="POST"):
 if(isset($_POST['log'])){
     $category_id = clean($_POST['category']);
     $tour = clean($_POST['tour']);
     $id =  date("ymdhis").rand(10000, 999999);     
     $cat = findCategoryName($category_id);
     $date = datePlusOneHour();
     //insert into dbase
     $q = $conn->query("INSERT INTO `dtournament` SET tid='$id', dcategory_id='$category_id', dcategory='$cat', dtour='$tour', ddate='$date' ");
     if($q){
        $_SESSION['msgs']='Added succesfully';
     }else{
        $_SESSION['msg']='Fail! try again later';
     }
     
     header("Location: manage-tournament");

 }else if(isset($_POST['logx'])){
    $category_id = clean($_POST['category']);
    $tour = clean($_POST['tour']);    
    $cat = findCategoryName($category_id);
    $id = clean($_POST['hid']);

    //insert into dbase
    $q = $conn->query("UPDATE `dtournament` SET dcategory_id='$category_id', dcategory='$cat', dtour='$tour' WHERE tid='$id' ");
    if($q){         
       $_SESSION['msgs']='Updated succesfully';
    }else{
       $_SESSION['msg']='Fail! try again later';
    }    
    header("Location: manage-tournament");

}else{
     $_SESSION['msg']='Oops! try again later';
     header("Location: index");
 }




endif;

function findCategoryName($data){
    $sql = runQuery("SELECT * FROM dgame_categories WHERE category_id='$data'")->fetch_assoc();
    return $sql['dcategory'];

}