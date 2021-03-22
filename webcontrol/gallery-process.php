<?php
require 'clean.php';
$id = date("ymdhis").rand(10000, 99999);
$transid = date("ymdhis");
include '../image_php/class.upload.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
   

    if(isset($_POST['log'])){

        if(!empty($_FILES['img']['name'])){ 
            insertImages($transid, $id);
        }
        header("Location: gallery");
      
    }elseif(isset($_POST['logx'])){

        $pi = clean($_POST['pi']);
        $himg = clean($_POST['himg']);

        if(!empty($_FILES['img']['name'])){ 
            insertImages($transid, $pi, 'yes');
            @unlink("../_gallery/$himg.jpg");
        }
        header("Location: gallery");
      
    }else{
        $_SESSION['msg']="Oops! you don't have access";
        header("Location: dashboard");
    }

}


function insertImages($transid, $rowId, $dataBase=Null){
    @list(, , $imtype, ) = getimagesize($_FILES['img']['tmp_name']); 
    if ($imtype == 3 or $imtype == 2 or $imtype == 1) {          
    $picid=$transid.'-1';
    $foo = new Upload($_FILES['img']);  
    include("../image_php/image_maker.php"); 
    if(is_null($dataBase)){
        runQuery("INSERT INTO dgallery SET dimg='$picid', gid='$rowId', ddate=Now()");
    }else{
        runQuery("UPDATE dgallery SET dimg='$picid' WHERE gid='$rowId'");
    }   
    // $conn->query("");
    }
    
}