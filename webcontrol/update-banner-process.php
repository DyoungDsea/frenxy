<?php
require 'clean.php';
$id = date("ymdhis").rand(10000, 99999);
$now = gmdate("Y-m-d H:i:s");
$date = date('Y-m-d H:i:s',strtotime("+1 hour",strtotime($now)));
$transid = date("ymdhis");
include '../image_php/class.upload.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    $post = clean($_POST['post']);
    $url = clean($_POST['url']);

    if(isset($_POST['add'])){
        $sql = runQuery("INSERT INTO dbanner SET dpost='$post', durl='$url', bid='$id'");
        insertImages($transid, $id);
        if($sql){
            $_SESSION['msgs']="Updated successfully";
        }else{
            $_SESSION['msg']="Oops! try again later";
        }
    }elseif(isset($_POST['update'])){
        $bi = clean($_POST['bi']);
        $himg = clean($_POST['himg']);
        if(!empty($_FILES['img']['name'])){ 
            insertImages($transid, $bi);
            @unlink("../banner/$himg.jpg");
        }
        $sql = runQuery("UPDATE dbanner SET durl='$url' WHERE bid='$bi'");
        if($sql){
            $_SESSION['msgs']="Updated successfully";
        }else{
            $_SESSION['msg']="Oops! try again later";
        }
    }

    header("Location: update_banner");

}

function insertImages($transid, $rowId){
    GLOBAL $conn;
    @list(, , $imtype, ) = getimagesize($_FILES['img']['tmp_name']); 
    if ($imtype == 3 or $imtype == 2 or $imtype == 1) {          
    $picid=$transid.'-1';
    $foo = new Upload($_FILES['img']);  
    include("../image_php/image_maker_advert_big.php");     
    $conn->query("UPDATE dbanner SET dimg='$picid' WHERE bid='$rowId'");
    }
    
}